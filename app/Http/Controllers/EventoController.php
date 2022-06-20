<?php

namespace App\Http\Controllers;

use App\Models\comentarioEventos;
use App\Models\Deporte;
use App\Models\Evento;
use App\Models\Participantes_evento;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('restringirModerador');
    }
    public function index()
    {

        return view('eventos.index')->with([
            'deportes' => Deporte::all(),
        ]);
    }

    public function crear()
    {
        return view('eventos.crear')->with([
            'deportes' => Deporte::all(),
        ]);
    }

    public function almacen()
    {

        $month = date('m');
        $day = date('d');
        $year = date('Y');

        $today = $year . '-' . $month . '-' . $day;

        if (request()->participantesTotales <= 0) {
            session()->flash('error', 'No puede tener  participantes inferiores o igual a 0');

            return redirect()->back();
        }
        if (request()->fechaEvento < $today) {
            session()->flash('error', 'La fecha no puede ser inferior a la fecha de hoy');

            return redirect()->back();
        }
        //$evento->save();

        $evento = Evento::create(request()->all());
        //dd($evento->id);

        DB::table('participantes_eventos')->insert([
            'participantesTotales' => 1,
            'capacidadParticipantes' => $evento->participantesTotales,
            'usuario_id' => $evento->usuario_id,
            'evento_id' => $evento->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('eventos.lista');
    }

    public function editar($evento)
    {
        //dd($request->id);
        return view('eventos.editar')->with([
            'deportes' => Deporte::all(),
            'evento' => Evento::findOrFail($evento),
        ]);
    }

    public function update($evento)
    {
        $evento = Evento::findOrFail($evento);
        //dd(request()->participantesTotales);

        $month = date('m');
        $day = date('d');
        $year = date('Y');

        $today = $year . '-' . $month . '-' . $day;

        if (request()->participantesTotales <= 0) {

            session()->flash('error', 'No puede tener  participantes inferiores o igual a 0');

            //dd(request()->participantesTotales);
            return redirect()->back();
        }
        
        if (request()->fechaEvento < $today) {
            session()->flash('error', 'La fecha no puede ser inferior a la fecha de hoy');

            return redirect()->back();
        }

        $evento->update(Request()->all());

        return redirect()->route('eventos.lista');
    }

    public function lista(Request $request)
    {
        $user = $request->user();
        $usuario_id = $user->id;
        //dd($usuario_id);
        $texto = trim($request->get('texto'));

        $eventoss = DB::table('eventos')
            ->join('deportes', 'eventos.deporte_id', '=', 'deportes.id')
            ->select('eventos.*', 'deportes.nombre as nombreDeporte')
            ->Where('nombreEvento', 'LIKE', '%' . $texto . '%', 'AND', 'usuario_id', '=', $usuario_id)
            ->orWhere('ubicacionEvento', 'LIKE', '%' . $texto . '%')
            ->orderBy('nombreEvento', 'asc')
            ->paginate(3);

        $eventos = DB::table('eventos')
            ->select('eventos.*', 'deportes.nombre as nombreDeporte')
            ->join('deportes', 'eventos.deporte_id', '=', 'deportes.id')
            ->where('usuario_id', '=', $usuario_id)
            ->Where('nombreEvento', 'LIKE', '%' . $texto . '%')
            ->orderBy('nombreEvento', 'asc')
            ->paginate(5);

        //dd($v);
        return view('eventos.lista', compact('eventos', 'texto'));
        //  return $eventos;
    }

    public function ver(Request $request)
    {
        $user = $request->user();
        $texto = trim($request->get('texto'));
        $usuario_id = $user->id;
        $eventos = DB::table('eventos')
            ->join('deportes', 'eventos.deporte_id', '=', 'deportes.id')
            ->select('eventos.*', 'deportes.nombre as nombreDeporte')
            ->where('usuario_id', $usuario_id)
            ->paginate(5);

        return view('eventos.lista', compact('eventos', 'user', 'texto'));

    }

    public function destruir(Request $request)
    {
        DB::table('participantes_eventos')->where('evento_id', $request->evento)->delete();

        $evento = Evento::findOrFail($request->evento);

        $evento->delete();

        return back();
    }

    public function buscar()
    {

        return null;
    }

    public function participar(Request $request)
    {
        //dd($request);

        $evento_id = (int) $request->id;
        $u = User::findOrFail($request->usuario_id);
        $eve = Evento::findOrFail($evento_id);
        $usuario_id = $u->id;
        $capacidadEvento = (int) $request->capacidad;

        $even = Participantes_evento::where('usuario_id', $usuario_id)
            ->where('evento_id', $evento_id)
            ->get();

        $eventoxid = Participantes_evento::where('usuario_id', $usuario_id)
            ->where('evento_id', $evento_id)
            ->orwhere('evento_id', $evento_id)
            ->orderByDesc('participantesTotales')
            ->get();
        /*$eventoxid = $eventoxid->reject(function ($eventoxid){
        return $eventoxid->cancelled;
        });*/
        //dd($eve);
        if (count($even) >= 1) {
            $request->session()->flash('error', 'Ya participas en este evento!');
            return redirect()->back();
        }

        if ($eve->estado == 2 || $eve->estado == 3) {
            request()->session()->flash('participar', 'El evento ha finalizado!');
            return back();
        }

        foreach ($eventoxid as $p) {

            //$c = $p->participantesTotales;

            if ($p->participantesTotales == $p->capacidadParticipantes) {

                $request->session()->flash('error', 'Sin cupo disponible!');
                return redirect()->back();
                break;

            } elseif ($p->participantesTotales < $p->capacidadParticipantes) {

                $c = $p->participantesTotales + 1;

                DB::table('participantes_eventos')->insert([
                    'participantesTotales' => $c,
                    'capacidadParticipantes' => $p->capacidadParticipantes,
                    'usuario_id' => $usuario_id,
                    'evento_id' => $evento_id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            } else {
                break;
            }
        }
        return redirect()->route('home');

    }

    public function comentar($evento)
    {

        $user = request()->user();
        $e = Evento::findOrFail($evento);
        $pxe = participantes_evento::where('evento_id', $evento)->get();
        //dd($pxe);
        foreach ($pxe as $p) {

            if ($user->id == $p->usuario_id) {
                return view('eventos.comentar')->with([
                    'evento' => $e,
                ]);
            }
        }
        if ($e->estado == 1) {
            request()->session()->flash('comentar', 'Unete al evento primero!');
            return back();
        } elseif ($e->estado == 2 || $e->estado == 3) {
            request()->session()->flash('comentar', 'El evento ha finalizado!');
            return back();
        }
        //dd($evento);

    }

    public function guardar()
    {
        //dd(request()->all());
        $evento_id = request('evento_id');
        $evento = Evento::findOrfail($evento_id);

        //dd($evento->estado);
        $comentario = ComentarioEventos::create(request()->all());

        $evento->save();
        return redirect()->route('home');
    }

    public function verEvento(Request $request)
    {
        $fecha = Carbon::now()->setTimezone('America/Santiago');

        //dd($fecha->todatestring());

        $evento = Evento::all();
        $evento_id = $request->evento_id;
        $usuario_id = $request->usuario_id;
        $participante_id = $request->participante_id;
        //dd($usuario_id);

        $comentario = comentarioEventos::where('evento_id', $evento_id)
            ->select('valoracion')
            ->get();

        $comment = DB::table('comentario_eventos')
            ->join('eventos', 'comentario_eventos.evento_id', '=', 'eventos.id')
            ->join('users', 'comentario_eventos.usuario_id', '=', 'users.id')
            ->select('comentario_eventos.*', 'users.name as nombre')
            ->where('comentario_eventos.evento_id', $evento_id)
            ->get();

        //dd($comment);
        $event = Evento::where('id', $evento_id)
            ->where('usuario_id', $usuario_id)
            ->get();
        $eventos = DB::table('eventos')
            ->join('deportes', 'eventos.deporte_id', '=', 'deportes.id')
            ->select('eventos.*', 'deportes.nombre as nombreDeporte', 'deportes.link as link')
            ->where('eventos.id', $evento_id)
            ->where('usuario_id', $usuario_id)
            ->get();

        $participantes_eventos = DB::table('participantes_eventos')
            ->join('eventos', 'participantes_eventos.evento_id', '=', 'eventos.id')
            ->join('users', 'participantes_eventos.usuario_id', '=', 'users.id')
            ->where('evento_id', $evento_id)
            ->select('participantes_eventos.*', 'users.name as nombre', 'users.apellido_paterno as apellidoPaterno', 'users.apellido_materno as apellidoMaterno')
            ->get();
        //dd($participantes_eventos);
        $suma = 0;
        $cont = 0;
        $calificacion;
        if (count($comentario) >= 1) {
            foreach ($comentario as $c) {
                $suma += $c->valoracion;
                $cont = $cont + 1;

            }
            $calificacion = $suma / $cont;
        }else{
            $calificacion = null;
        }

        //dd(round($calificacion));
        return view('eventos.ver')->with([
            'comentarios' => $comment,
            'participantes_eventos' => $participantes_eventos,
            'eventos' => $eventos,
            'star' => round($calificacion),
            'calificacion' => round($calificacion, 1),
        ]);

    }

}
