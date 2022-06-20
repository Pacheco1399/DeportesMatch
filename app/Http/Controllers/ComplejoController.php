<?php

namespace App\Http\Controllers;

use App\Models\complejos_deportivo;
use App\Models\user;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComplejoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrador');
        //$this->middleware('usuario');
    }

    public function index()
    {

    }

    public function crearComplejo(Request $request)
    {
        $mod = User::where('rol', 2)->get();
        //dd($mod);
        return view('complejos.crear')->with([
            'moderadores' => $mod,
        ]);

    }

    public function almacen(Request $request)
    {

        $complejos = complejos_deportivo::all();
        //$titulo = trim($request->nombre);

        if (count($complejos) == 0) {

            $c = $request->all();
            $cantCanchas = $request->cantCanchas;

            $com = complejos_deportivo::where('usuario_id', $c->usuario_id)->get();

            if (count($com) == 0) {
                complejos_deportivo::create([
                    'nombre' => $c->nombre,
                    'ubicacion' => $c->ubicacion,
                    'cantCanchas' => $c->cantCanchas,
                    'usuario_id' => $c->usuario_id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                for ($i = 1; $i <= $cantCanchas; $i++) {
                    DB::table('canchas')->insert([
                        'nombre' => 'Cancha ' . $i . '',
                        'complejo_id' => $com->id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            } else {
                session()->flash('usuario', 'El usuario ya pertenece a un complejo deportivo!');
                return redirect()->back();
            }

            return redirect()->route('reserva.crear');

            //dd($complejos = complejos_deportivo::all());
        }

        foreach ($complejos as $c) {
            if ($c->nombre == $request->nombre) {
                session()->flash('nombre', 'El nombre está en uso!');
                return redirect()->back();
            }
        }
        $c = $request->all();

        $com = complejos_deportivo::where('usuario_id', $c['usuario_id'])->get();
        //dd($com);
        if (count($com) == 0) {
            $cantCanchas = $request->cantCanchas;
            //dd($cantCanchas);

            $comple= complejos_deportivo::create([
                'nombre' => $request->nombre,
                'ubicacion' => $request->ubicacion,
                'cantCanchas' => $request->cantCanchas,
                'usuario_id' => $request->usuario_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            //dd($comple->id);
            for ($i = 1; $i <= $cantCanchas; $i++) {
                DB::table('canchas')->insert([
                    'nombre' => 'Cancha ' . $i . '',
                    'complejo_id' => $comple->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

        } else {
            session()->flash('usuario', 'El usuario ya pertenece a un complejo deportivo!');
            return redirect()->back();
        }

        return redirect()->route('reserva.crear');

    }
    public function lista()
    {

    }
    public function buscar()
    {
        return view('complejos.buscar');

    }
    public function editarComplejo()
    {

    }
    public function editar()
    {

    }
    public function delete()
    {

    }
}
