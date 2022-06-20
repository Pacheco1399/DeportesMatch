<?php

namespace App\Http\Controllers;

use App\Models\cancha;
use App\Models\complejos_deportivo;
use App\Models\Deporte;
use App\Models\Evento;
use App\Models\Reserva;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redirect;
use Response;

class ReservaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('moderador');

    }

    public function index(Request $request)
    {
        //$date = Carbon::now();

        $data = Reserva::where('cancha_id', $request->cancha_id)
            ->get(['id', 'title', 'description', 'fecha', 'start', 'end']);

        return response()->json($data);

        //return view('reservas.ver');
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            if ($request->type == 'add') {
                $event = Reserva::create([
                    'titulo' => $request->title,
                    'inicio' => $request->start,
                    'fin' => $request->end,
                ]);

                return response()->json($event);
            }

            if ($request->type == 'update') {
                $event = Reserva::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
            }

            if ($request->type == 'delete') {
                $event = Reserva::find($request->id)->delete();

                return response()->json($event);
            }
        }
    }

    public function indexxxx(Request $request)
    {
        if ($request->ajax()) {
            $data = Reserva::whereDate('inicio', '>=', $request->inicio)
                ->whereDate('fin', '<=', $request->fin)
                ->get(['id', 'titulo', 'inicio', 'fin', 'usuario_id']);
            return response()->json($data);
        }
        return view('reservas.ver');
    }

    public function actionnnnn(Request $request)
    {
        if ($request->ajax()) {
            if ($request->type == 'add') {
                $event = Reserva::create([
                    'titulo' => $request->titulo,
                    'inicio' => $request->inicio,
                    'fin' => $request->fin,
                    'usuario_id' => 1,
                ]);

                return response()->json($event);
            }

            if ($request->type == 'update') {
                $event = Reserva::find($request->id)->update([
                    'titulo' => $request->titulo,
                    'inicio' => $request->inicio,
                    'fin' => $request->fin,
                    'usuario_id' => 1,
                ]);

                return response()->json($event);
            }

            if ($request->type == 'delete') {
                $event = Reserva::find($request->id)->delete();

                return response()->json($event);
            }
        }
    }

    public function verReserva()
    {
        return view('reservas.ver')->with([
            'deportes' => Deporte::all(),
        ]);
    }

    public function lista(Request $request)
    {

        $data = Reservas::all($fecha);
        //dd($data);
        //echo '<script language="javascript">alert("juas");</script>';
        return response()->json([
            'reservas' => $data,
        ]);

    }

    public function crearReserva(Request $request)
    {

        $user = $request->user();
        $eventos = Evento::where('usuario_id', $user->id)->get();

        //echo '<script language="javascript">alert("juas");</script>';
        return view('reservas.crear')->with([
            'complejos' => complejos_deportivo::all(),
            'eventos' => $eventos,
        ]);

    }
    public function almacen(Request $request)
    {
        $reserva = Reserva::where('cancha_id', $request->cancha_id)->get();
        //dd($reserva);
        $r = $request->all();
        $start = ($request->fecha . ' ' . $request->start);
        $end = ($request->fecha . ' ' . $request->end . ':00');
        $complejo_id = $request->complejo_id;
        $cancha_id = $request->cancha_id;
        //$cancha = request();

        if (count($reserva) == 0) {

            $r = $request->all();
            $start = ($request->fecha . ' ' . $request->start);
            $end = ($request->fecha . ' ' . $request->end . ':00');
            $complejo_id = $request->complejo_id;
            $cancha = $request->cancha;

            //dd($start);
            //dd($reserva);
            Reserva::create([
                'title' => $request->title,
                'descripcion' => $request->descripcion,
                'fecha' => $request->fecha,
                'start' => $start,
                'end' => $end,
                'complejo_id' => $complejo_id,
                'cancha_id' => $cancha_id,
                'evento_id' => $request->evento_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            //dd($complejo);
        } else {
            foreach ($reserva as $re) {

                if ($re->start == $start) {

                    session()->flash('start', 'Ya hay una reserva registrada en este horario');

                    return redirect()->back();
                }
            }
            //dd($start);

            $start = ($request->fecha . ' ' . $request->start);
            $end = ($request->fecha . ' ' . $request->end . ':00');
            //dd($cancha_id);
            Reserva::create([
                'title' => $request->title,
                'descripcion' => $request->descripcion,
                'fecha' => $request->fecha,
                'start' => $start,
                'end' => $end,
                'complejo_id' => $complejo_id,
                'cancha_id' => $cancha_id,
                'evento_id' => $request->evento_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $evento = Evento::findOrFail($request->evento_id);
            $complejo = complejos_deportivo::findOrFail($request->complejo_id);
            //dd($complejo);
            $evento->ubicacionEvento = $complejo->ubicacion;
            $evento->save();

        }
        return redirect()->route('reserva.crear');
    }

    public function update(Request $request)
    {
        $reserva = Reserva::findOrFail($request->id);
        $start = ($request->fecha . ' ' . $request->start);
        $end = ($request->fecha . ' ' . $request->end);
        $reserva->title = $request->title;
        $reserva->fecha = $request->fecha;
        $reserva->start = $start;
        $reserva->end = $end;
        $reserva->description = $request->description;
        $reserva->save();
        return back();
    }

    public function buscar()
    {
        return view('reservas.buscar');
    }

    public function index2(Request $request)
    {
        $data = Reserva::where('fecha', $request->fechaReserva)
            ->get(['id', 'title', 'description', 'fecha', 'start', 'end']);

        return response()->json($data);

    }

    public function index3(Request $request)
    {
        $data = Reserva::join('complejos_deportivos', 'complejo_id', '=', 'complejos_deportivos.id')
            ->where('complejos_deportivos.usuario_id', $request->usuario_id)
            ->get(['title', 'description', 'fecha', 'start', 'end']);
        return response()->json($data);

    }

    public function eventoLista(Request $request)
    {
        if ($request->ajax()) {
            $evento = Evento::where('id', $request->evento_id)->get();

            foreach ($evento as $c) {
                $event[$c->id] = [
                    'title' => $c->nombreEvento,
                    'fecha' => $c->fechaEvento,
                    'start' => $c->horaEvento,
                ];
            }
            return response()->json($event);
        }
    }

    public function delete(request $request)
    {
        //dd($request->delete);
        $r = Reserva::findOrFail($request->delete);
        $r->delete();
        return redirect()->route('reserva.buscar');
    }

}
