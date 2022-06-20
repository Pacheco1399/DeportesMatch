<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Deporte;
use App\Models\Equipo;
use App\Models\Integrantes_equipo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//use Illuminate\Support\Collection\array_merge;

class EquipoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('restringirModerador');
        //$this->middleware('administrador');

        //$user = Auth::user()->rol;
        //dd();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearEquipo()
    {
        return view('equipos.crear')->with([
            'deportes' => Deporte::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function almacen(Request $request)
    {
        $equipos = Equipo::all();
        //dd($request->usuario_id);
        if ($equipos->isEmpty()) {

            $team = Equipo::create($request->all());

            DB::table('integrantes_equipos')->insert([
                'usuario_id' => $team->usuario_id,
                'equipo_id' => $team->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        } else {

            foreach ($equipos as $e) {
                if ($e->nombreEquipo == $request->nombreEquipo) {
                    session()->flash('error', 'El nombre de equipo ya esta en uso!');

                    return redirect()->back();
                }
            }
            //$e = $request->all();
            //dd($e);

            $team = Equipo::create($request->all());
            //dd($team->nombreEquipo);

            DB::table('integrantes_equipos')->insert([
                'usuario_id' => $team->usuario_id,
                'equipo_id' => $team->id,
                'fundador' => $team->usuario_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        return redirect()->route('equipos.ver');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function verMisEquipos(Request $request)
    {

        //dd($request->nombreEquipo);

        $user = $request->user();

        $equipos = DB::table('equipos')
            ->join('deportes', 'equipos.deporte_id', '=', 'deportes.id')
            ->join('users', 'equipos.usuario_id', '=', 'users.id')
            ->select('equipos.*', 'deportes.nombre as nombreDeporte', 'users.name as nombreFundador')
            ->where('usuario_id', $user->id)
            ->orderBy('nombreEquipo', 'asc')
            ->paginate(5);

        //dd($equipos);

        $integrantes_equipo = DB::table('integrantes_equipos')
            ->join('equipos', 'integrantes_equipos.equipo_id', '=', 'equipos.id')
            ->join('users', 'integrantes_equipos.usuario_id', '=', 'users.id')
            ->select('integrantes_equipos.*', 'equipos.nombreEquipo as nombreEquipo', 'integrantes_equipos.fundador as nombreFundador')
            ->where('users.id', $user->id)
            ->paginate(5);

        //$arr = array_merge($equipos, compact($integrantes_equipo));

        return view('equipos.lista')->with([
            'equipos' => $equipos,
            'integrantes_equipo' => $integrantes_equipo,
        ]);
    }

    public function buscar()
    {

        $equipos = DB::table('equipos')
            ->select('equipos.*', 'deportes.nombre as nombreDeporte', 'users.name as nombreFundador')
            ->join('deportes', 'equipos.deporte_id', '=', 'deportes.id')
            ->join('users', 'equipos.usuario_id', '=', 'users.id')
            ->orderBy('nombreEquipo', 'asc')
            ->paginate(10);

        $integrantes = Integrantes_equipo::all();

        return view('equipos.buscar')->with([
            'equipos' => $equipos,
            'integrantes' => $integrantes,
        ]);
    }

    public function buscarEquipo(Request $request)
    {
        $user = $request->user();
        $texto = $request->texto;
        //dd($texto);
        $equipos = DB::table('equipos')
            ->select('equipos.*', 'deportes.nombre as nombreDeporte', 'users.name as nombreFundador')
            ->join('deportes', 'equipos.deporte_id', '=', 'deportes.id')
            ->join('users', 'equipos.usuario_id', '=', 'users.id')
            ->Where('nombreEquipo', 'LIKE', '%' . $texto . '%')
            ->orderBy('nombreEquipo', 'asc')
            ->paginate(5);
        $integrantes = Integrantes_equipo::all();

        return view('equipos.buscar')->with([
            'equipos' => $equipos,
            'integrantes' => $integrantes,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */

    public function verEquipo($equipo)
    {
        $e = Equipo::findOrFail($equipo);
        $year = $e->created_at->format('Y');

        $equipo = DB::table('equipos')
            ->join('deportes', 'equipos.deporte_id', '=', 'deportes.id')
            ->join('users', 'equipos.usuario_id', '=', 'users.id')
            ->select('equipos.*', 'deportes.nombre as nombreDeporte', 'users.name as nombreFundador')
            ->where('equipos.id', $e->id)
            ->get();

        $integrantes_equipo = DB::table('integrantes_equipos')
            ->join('equipos', 'integrantes_equipos.equipo_id', '=', 'equipos.id')
            ->join('users', 'integrantes_equipos.usuario_id', '=', 'users.id')
            ->select('integrantes_equipos.*', 'users.name as nombre', 'users.apellido_paterno as apellidoPaterno', 'users.apellido_materno as apellidoMaterno')
            ->where('equipo_id', $e->id)
            ->get();

        $u = request()->user();

        $integrantes = Integrantes_equipo::where('equipo_id', $equipo[0]->id)
            ->where('usuario_id', $u->id)
            ->get();

        $n = count($integrantes);
        $abandonar = 0;
        if ($n >= 1) {
            $abandonar = 1;
        }

        $nombre = $e->nombreEquipo;
//dd($equipo[0]->foto);
        $eventos = DB::table('eventos')
            ->join('deportes', 'eventos.deporte_id', '=', 'deportes.id')
            ->select('eventos.*', 'deportes.nombre as nombreDeporte')
            ->get();
        return view('equipos.ver')->with([
            'abandonar' => $abandonar,
            'equipo' => $equipo,
            'integrantes_equipo' => $integrantes_equipo,
            'nombre' => $nombre,
            'year' => $year,
            'eventos' => $eventos,
        ]);

    }

    public function editar($equipo)
    {
        $user = request()->user();

        $equipo = Equipo::findOrFail($equipo);
        //dd($equipo->usuario_id);
        if ($user->id == $equipo->usuario_id) {
            # code...
            //dd($equipo);
            return view('equipos.editar')->with([
                'equipo' => $equipo,
                'pic' => $equipo->foto,
                'deportes' => Deporte::all(),
            ]);
        } else {
            return back();
        }

    }

    public function update($equipo)
    {

        //dd(request()->nombreEquipo);
        $nombreEquipo = request()->nombreEquipo;
        $deporte = request()->deporte_id;
        $usuario = request()->usuario_id;
        $id = request()->id;

        $descripcion = request()->descripcion;
        $publico = request()->publico;
        $privado = request()->privado;
        $capacidad = request()->capacidad;
        $escudo = request()->escudo;
        $e = Equipo::findOrFail($id);
        $inte = Integrantes_equipo::where('equipo_id', $id)->get();
        //dd($inte);

        //dd($request);
        if (request()->hasfile('escudo')) {
            $destinationPath = 'image/';
            $fotoEscudos = date('YmdHis') . "." . $escudo->getClientOriginalExtension();
            $escudo->move($destinationPath, $fotoEscudos);
            $e->foto = $fotoEscudos;

        }

        if ($publico == "on" && $privado == "on") {
            request()->session()->flash('privacidad', 'Selecciona solo 1 privacidad');
            return back();
        }

        //dd($publico);
        if ($publico == "on") {
            //la privacidad es publico
            $e->privacidad = 0;
        } elseif ($privado == "on") {
            //la privacidad es cerrado
            $e->privacidad = 1;
        }

        //dd(count($inte));
        if ($capacidad < count($inte)) {
            request()->session()->flash('capacidad', 'Existen participantes en el equipo, capacidad minima de ' . count($inte) . '.');
            return back();
        }

        //dd($equipo);

        $e->descripcion = $descripcion;
        $e->nombreEquipo = $nombreEquipo;
        $e->capacidad = $capacidad;
        $e->usuario_id = $usuario;
        $e->deporte_id = $deporte;
        $e->save();

        $equipos = DB::table('equipos')
            ->select('equipos.*', 'deportes.nombre as nombreDeporte', 'users.name as nombreFundador')
            ->join('deportes', 'equipos.deporte_id', '=', 'deportes.id')
            ->join('users', 'equipos.usuario_id', '=', 'users.id')
            ->orderBy('nombreEquipo', 'asc')
            ->paginate(20);

        return back();
    }

    public function unirse(Request $request)
    {
        $equipo_id = $request->equipo_id;
        $usuario_id = $request->usuario_id;

        $equipo = equipo::FindOrFail($equipo_id);

        $integrantes = Integrantes_equipo::where('equipo_id', $equipo_id)
            ->where('usuario_id', $usuario_id)
            ->get();

        //dd($integrantes[0]->cantidad);
        $integrante_equipo = Integrantes_equipo::where('equipo_id', $equipo_id)
            ->get();
        //dd($integrante_equipo[0]);
        $n = count($integrantes);
        if ($n >= 1) {
            $request->session()->flash('error', 'Ya eres parte de este equipo!');
            return back();

        }

        if ($equipo->miembros >= $equipo->capacidad) {
            $request->session()->flash('error', 'Equipo sin cupo!');
            return back();
        }

        //dd($equipo);
        if (count($integrante_equipo) == 0) {
            DB::table('integrantes_equipos')->insert([
                'usuario_id' => $usuario_id,
                'equipo_id' => $equipo_id,
                'fundador' => $equipo->usuario_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $equipo->miembros++;
            $equipo->save();
            return back();
        }
        //$c = $integrante_equipo[0]->cantidad + 1;

        DB::table('integrantes_equipos')->insert([
            'usuario_id' => $usuario_id,
            'equipo_id' => $equipo_id,
            'fundador' => $integrante_equipo[0]->fundador,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $equipo->miembros++;
        $equipo->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destruir(Request $request)
    {
        DB::table('integrantes_equipos')->where('equipo_id', $request->id)->delete();

        $equipo = Equipo::findOrFail($request->id);

        $equipo->delete();

        return redirect()->route('equipos.ver');
    }

    public function abandonar(Request $request)
    {
        DB::table('integrantes_equipos')->where('equipo_id', $request->id)->where('usuario_id', $request->usuario_id)->delete();
        $equipo = Equipo::findOrFail($request->id);
        $equipo->miembros--;
        $equipo->save();
        return back();
    }

    public function configurarEquipo(Request $request)
    {

    }
}
