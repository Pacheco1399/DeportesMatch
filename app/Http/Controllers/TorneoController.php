<?php

namespace App\Http\Controllers;

use App\Models\Deporte;
use App\Models\Equipo;
use App\Models\Puntuacion;
use App\Models\Torneo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class TorneoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('restringirModerador');
    }
    public function index()
    {
        return view('torneos.index');
    }

    public function crear()
    {
        return view('torneos.crear')->with([
            'deportes' => Deporte::all(),
        ]);
    }

    public function almacen()
    {

        $month = date('m');
        $day = date('d');
        $year = date('Y');

        $today = $year . '-' . $month . '-' . $day;

        if (request()->fecha < $today) {
            session()->flash('error', 'La fecha no puede ser inferior a la fecha de hoy');

            return redirect()->back();
        }

        $torneo = Torneo::create(request()->all());

        return redirect()->route('torneos.index');
    }
    public function editar($torneo)
    {
        return view('torneos.editar')->with([
            'deportes' => Deporte::all(),
            'torneo' => Torneo::findOrFail($torneo),
        ]);
    }

    public function update($torneo)
    {
        $torneo = Torneo::findOrFail($torneo);

        $torneo->update(Request()->all());

        return redirect()->route('torneos.lista');
    }

    public function administrar($torneo)
    {

        $equipo1 = Db::table('puntuacions')
            ->join('equipos', 'puntuacions.equipo_id', '=', 'equipos.id')
            ->join('torneos', 'puntuacions.torneo_id', '=', 'torneos.id')
            ->select('puntuacions.*', 'equipos.nombreEquipo as nombreEquipo', 'torneos.nombre as nombreTorneo')
            ->where('puntuacions.torneo_id', $torneo)
            ->get();
        //dd($equipo1);

        return view('torneos.administrar')->with([
            'puntuacion' => $equipo1,
            'torneo' => Torneo::findOrFail($torneo),
            'equipos' => Equipo::all(),

        ]);
    }

    public function lista(Request $request)
    {

        $texto = trim($request->get('texto'));
        $torneos = DB::table('torneos')
            ->join('deportes', 'torneos.deporte_id', '=', 'deportes.id')
            ->select('torneos.*', 'deportes.nombre as nombreDeporte')
            ->where('deporte_id', 'LIKE', '%' . $texto . '%')
            ->orWhere('direccion_torneo', 'LIKE', '%' . $texto . '%')
            ->orderBy('nombre', 'asc')
            ->paginate(5);

        return view('torneos.lista', compact('torneos', 'texto'));
    }

    public function verTorneo()
    {
        return view('torneos.verTorneo')->with([
            'puntuacion' => Puntuacion::all(),
            'torneo' => Torneo::all(),

        ]);
    }

    public function equiposparticipantes(Request $request)
    {
        if (isset($request->texto)) {
            $cantidadEquipostorneos = CantidadEquiposTorneos::whereTipoTorneo_id($request->texto)->get();
            return response()->json(
                [
                    'lista' => $cantidadEquipostorneos,
                    'success' => true,
                ]
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                ]
            );
        }
    }
    public function torneoporequipos()
    {

        return view('torneos.TorneoPorEquipos')->with([
            'puntuacion' => Puntuacion::all(),
        ]);
    }
    public function puntosportorneo($posicion)
    {
        //dd($posicion);

        $puntuacions = Puntuacion::findOrFail($posicion);
        $posicion = $puntuacions->posicion;
        $torneo_id = $puntuacions->torneo_id;

        if ($posicion % 2 == 0) {
            $posicion2 = $posicion - 1;
            //dd($posicion2);
            $equipo1 = Db::table('puntuacions')
                ->join('equipos', 'puntuacions.equipo_id', '=', 'equipos.id')
                ->join('torneos', 'puntuacions.torneo_id', '=', 'torneos.id')
                ->select('puntuacions.*', 'equipos.nombreEquipo as nombreEquipo', 'torneos.nombre as nombreTorneo', 'torneos.tipo_torneo as tipo_torneo'  )
                ->where('puntuacions.torneo_id', $torneo_id)
                ->where('puntuacions.posicion', $posicion)
                ->orwhere('puntuacions.posicion', $posicion2)
                ->where('puntuacions.torneo_id', $torneo_id)
                ->get();
        } else {
            $posicion2 = $posicion + 1;
            $equipo1 = Db::table('puntuacions')
                ->join('equipos', 'puntuacions.equipo_id', '=', 'equipos.id')
                ->join('torneos', 'puntuacions.torneo_id', '=', 'torneos.id')
                ->select('puntuacions.*', 'equipos.nombreEquipo as nombreEquipo', 'torneos.nombre as nombreTorneo' , 'torneos.tipo_torneo as tipo_torneo')
                ->where('puntuacions.torneo_id', $torneo_id)
                ->where('puntuacions.posicion', $posicion)
                ->orwhere('puntuacions.posicion', $posicion2)
                ->where('puntuacions.torneo_id', $torneo_id)
                ->get();

        }
        
   // dd($equipo1);

        return view('torneos.puntosportorneo')->with([
            'puntuacion' => $equipo1,
        ]);
    }

    public function moverPuesto($posicion)
    {

       
        $puntuacions = Puntuacion::findOrFail($posicion);
       //dd($puntuacions);

        $posicion = $puntuacions->posicion;
        
        $torneo_id = $puntuacions->torneo_id;


       

            $posicion2 = $posicion + 1;
            
            $equipo1 = Db::table('puntuacions')
                ->join('equipos', 'puntuacions.equipo_id', '=', 'equipos.id')
                ->join('torneos', 'puntuacions.torneo_id', '=', 'torneos.id')

                ->where('puntuacions.torneo_id', $torneo_id)
                ->where('posicion', $posicion, $posicion2)
                ->orwhere('posicion', $posicion2 )
                ->where('torneo_id', $torneo_id)
                ->select('puntuacions.*', 'equipos.nombreEquipo as nombreEquipo', 'torneos.nombre as nombreTorneo' , 'torneos.tipo_torneo as tipo_torneo')
                ->get();

            
        

       // dd($equipo1);

        return view('torneos.moverPuesto')->with([

            'puntuacion' => $equipo1,

        ]);
    }

    public function guardarpuntuacion($torneo)
    {

        $posicion = (int) request()->posicion;
       
        //dd($posicion);
        $puntuacion = Puntuacion::findOrFail($posicion);
        $torneoid = $puntuacion->torneo_id;
        //dd($puntuacion);
       
        

        if ($posicion % 2 == 0) {

            $posicion2 = $posicion - 1;
            $puntuacion->estado = 1;
            $puntuacion->save();

            $puntuacion2 = Puntuacion::findOrFail($posicion2);
            $puntuacion2->estado = 2;
            $puntuacion2->save();

        } else {

            $posicion2 = $posicion + 1;
            $puntuacion->estado = 1;
            $puntuacion->save();

            $puntuacion2 = Puntuacion::findOrFail($posicion2);
            $puntuacion2->estado = 2;
            $puntuacion2->save();

        }   

        return redirect()->route('torneos.administrar', $torneoid);
    }

    public function guardarempate($torneo)
    {

        $posicion = (int) request()->posicion;
       
        //dd($posicion);
        $puntuacion = Puntuacion::findOrFail($posicion);
        $torneoid = $puntuacion->torneo_id;
        //dd($puntuacion);
       
        

        if ($posicion % 2 == 0) {

            $posicion2 = $posicion - 1;
            $puntuacion->estado = 3;
            $puntuacion->save();

            $puntuacion2 = Puntuacion::findOrFail($posicion2);
            $puntuacion2->estado = 3;
            $puntuacion2->save();

        } else {

            $posicion2 = $posicion + 1;
            $puntuacion->estado = 3;
            $puntuacion->save();

            $puntuacion2 = Puntuacion::findOrFail($posicion2);
            $puntuacion2->estado = 3;
            $puntuacion2->save();

        }   

        return redirect()->route('torneos.administrar', $torneoid);
    }


    public function guardarpuesto($torneo)
    {
       // dd($torneo);

        $equipos = Torneo::findOrFail($torneo);

        $torneos = DB::table('torneos')
            ->where('torneos.id', $torneo)
            ->get();
        //dd($torneos);
        $posicion = (int) request()->posicion;
        //dd($posicion);

        //$puntu = Puntuacion::findOrFail($posicion);
        
        $puntu = DB::table('puntuacions')
        ->where('puntuacions.posicion', $posicion)
        ->where('puntuacions.torneo_id', $torneo)
        ->get();
       
        $thisId = $puntu[0]->id;
        

        $equipoGanador = Puntuacion::findOrFail($thisId);

        $cantidadEquipos = $torneos[0]->cantidad_equipos;

        if ($cantidadEquipos >= 0 && $cantidadEquipos <= 8) {

            if ($equipoGanador->posicion == 1 || $equipoGanador->posicion == 2) {

                $equipoGanador->posicion = 9;

            } elseif ($equipoGanador->posicion == 3 || $equipoGanador->posicion == 4) {
                
                $equipoGanador->posicion = 10;

            } elseif ($equipoGanador->posicion == 5 || $equipoGanador->posicion == 6) {

                $equipoGanador->posicion = 11;

            } elseif ($equipoGanador->posicion == 7 || $equipoGanador->posicion == 8) {

                $equipoGanador->posicion = 12;

            } elseif ($equipoGanador->posicion == 9 || $equipoGanador->posicion == 10) {

                $equipoGanador->posicion = 13;

            } elseif ($equipoGanador->posicion == 11 || $equipoGanador->posicion == 12) {

                $equipoGanador->posicion = 14;

            } elseif ($equipoGanador->posicion == 13 || $equipoGanador->posicion == 14) {

                $equipoGanador->posicion = 23;

            } elseif ($equipoGanador->posicion == 15 || $equipoGanador->posicion == 16) {

                $equipoGanador->posicion = 24;

            } elseif ($equipoGanador->posicion == 17 || $equipoGanador->posicion == 18) {

                $equipoGanador->posicion = 25;

            } elseif ($equipoGanador->posicion == 19 || $equipoGanador->posicion == 20) {

                $equipoGanador->posicion = 26;

            } elseif ($equipoGanador->posicion == 21 || $equipoGanador->posicion == 22) {

                $equipoGanador->posicion = 27;

            } elseif ($equipoGanador->posicion == 23 || $equipoGanador->posicion == 24) {

                $equipoGanador->posicion = 28;

            } elseif ($equipoGanador->posicion == 25 || $equipoGanador->posicion == 26) {

                $equipoGanador->posicion = 29;

            } elseif ($equipoGanador->posicion == 27 || $equipoGanador->posicion == 28) {

                $equipoGanador->posicion = 30;
            }

            $equipoGanador->save();
            return redirect()->route('torneos.administrar', $equipoGanador->torneo_id);
        }

        if ($cantidadEquipos >= 9 && $cantidadEquipos <= 16) {

           
            if ($equipoGanador->posicion == 1 || $equipoGanador->posicion == 2) {

                $equipoGanador->posicion = 17;

            } elseif ($equipoGanador->posicion == 3 || $equipoGanador->posicion == 4) {
                
                $equipoGanador->posicion = 18;

            } elseif ($equipoGanador->posicion == 5 || $equipoGanador->posicion == 6) {

                $equipoGanador->posicion = 19;

            } elseif ($equipoGanador->posicion == 7 || $equipoGanador->posicion == 8) {

                $equipoGanador->posicion = 20;

            } elseif ($equipoGanador->posicion == 9 || $equipoGanador->posicion == 10) {

                $equipoGanador->posicion = 21;

            } elseif ($equipoGanador->posicion == 11 || $equipoGanador->posicion == 12) {

                $equipoGanador->posicion = 22;

            } elseif ($equipoGanador->posicion == 13 || $equipoGanador->posicion == 14) {

                $equipoGanador->posicion = 23;

            } elseif ($equipoGanador->posicion == 15 || $equipoGanador->posicion == 16) {

                $equipoGanador->posicion = 24;

            } elseif ($equipoGanador->posicion == 17 || $equipoGanador->posicion == 18) {

                $equipoGanador->posicion = 25;

            } elseif ($equipoGanador->posicion == 19 || $equipoGanador->posicion == 20) {

                $equipoGanador->posicion = 26;

            } elseif ($equipoGanador->posicion == 21 || $equipoGanador->posicion == 22) {

                $equipoGanador->posicion = 27;

            } elseif ($equipoGanador->posicion == 23 || $equipoGanador->posicion == 24) {

                $equipoGanador->posicion = 28;

            } elseif ($equipoGanador->posicion == 25 || $equipoGanador->posicion == 26) {

                $equipoGanador->posicion = 29;

            } elseif ($equipoGanador->posicion == 27 || $equipoGanador->posicion == 28) {

                $equipoGanador->posicion = 30;

            }
            //DB::table('puntuacions')->update($puntu);

            $equipoGanador->save();

            return redirect()->route('torneos.administrar', $equipoGanador->torneo_id);
        }

    }
    public function visualizar($equipo)
    {
        
        $puntuacion = Puntuacion::all();
        $torneos = Torneo::all();

        return view('torneos.buscar')->with([
            'torneo' => $torneos,
            'puntuacion' => $puntuacion,
            'equipo_id' => $equipo,
        ]);
    }
    public function unirse (Request $request){
        $equipo_id = $request->equipo_id;
        $torneo_id = $request->torneo_id;
        
        $puntuacion = puntuacion::all();

        $participantes = puntuacion::where('equipo_id', $equipo_id)
        ->where('torneo_id', $torneo_id)
        ->get();
        
        $totalinscritos = puntuacion::where('torneo_id', $torneo_id)
        ->get();
        
        $cantidadParticipantes = DB::table('torneos')
        ->select('inscritos')
        ->where('id', $torneo_id)
        ->get();
        $numeric = $cantidadParticipantes[0]->inscritos+1;

        if(count($participantes) == 0){
           
            $updateTorneos = DB::table('Torneos')
            ->where('id', $torneo_id)
            ->update([
                'inscritos' => $numeric,
            ]);
            
            $buscarEquipo = DB::table('Puntuacions')
            ->select('puntuacions.equipo_id')
            ->where('equipo_id' , $equipo_id)
            ->where('torneo_id', $torneo_id)
            ->get();

            $buscarPosicion = DB::table('Puntuacions')
            ->where('torneo_id', $torneo_id)
            ->select('puntuacions.posicion')
            ->get();
        
            $saberPosicion = count($buscarPosicion);
            $saberPosicion = $saberPosicion+1;
        

            DB::table('Puntuacions')
                ->insert([
                    
                    'equipo_id' => $equipo_id,
                    'torneo_id' => $torneo_id,
                    'estado' => 0,
                    'posicion' => $saberPosicion,
                ]);
            $request->session()->flash('Exito!', 'Te tu equipo se ha incorporado correctamente al torneo!');
           
            return back();
            
        }else{
            $request->session()->flash('error', 'El equipo ya es  parte de este torneo!');
           
            return back();
        }
    }

    public function verTorneos($torneo){
        $equipo1 = Db::table('puntuacions')
        ->join('equipos', 'puntuacions.equipo_id', '=', 'equipos.id')
        ->join('torneos', 'puntuacions.torneo_id', '=', 'torneos.id')
        ->select('puntuacions.*', 'equipos.nombreEquipo as nombreEquipo', 'torneos.nombre as nombreTorneo')
        ->where('puntuacions.torneo_id', $torneo)
        ->get();
    //dd($equipo1);

    return view('torneos.verTorneos')->with([
        'puntuacion' => $equipo1,
        'torneo' => Torneo::findOrFail($torneo),
        'equipos' => Equipo::all(),

    ]);
    }

    public function destruir(Request $request)
    {
        
        $puntuacions = DB::table('puntuacions')
        ->where('torneo_id', $request->id)
        ->delete();
        
        $torneo = Torneo::findOrFail($request->id);

        $torneo->delete();

        return back();

    }
    
}
