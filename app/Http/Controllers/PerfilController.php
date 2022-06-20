<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerfilRequest;
use App\Models\Deporte;
use App\Models\User;
use Carbon\Carbon;
use Freshwork\ChileanBundle\Rut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editarPerfil(Request $request)
    {
        $user = $request->user();
        $sports = DB::table('deportes')->get();

        $uDeportes = DB::table('usuarios_deportes')
            ->where('usuario_id', $user->id)
            ->get();

        return view('perfil/editar', compact('user', 'sports', 'uDeportes'));
    }

    public function verPerfil(Request $request)
    {

        $user = $request->user();
        $usuario_id = $user->id;
        $eventos = DB::table('eventos')
            ->join('deportes', 'eventos.deporte_id', '=', 'deportes.id')
            ->select('eventos.*', 'deportes.nombre as nombreDeporte', 'deportes.link as link')
            ->where('usuario_id', $usuario_id)
            ->paginate(5);
        //dd($eventos);
        $sports = DB::table('deportes')->get();
        $uDeportes = DB::table('usuarios_deportes')->get();

        //dd($uDeportes);
        return view('perfil/verPerfil', compact('user', 'eventos', 'sports', 'uDeportes'));
    }

    public function lista(Request $request)
    {

        $texto = trim($request->get('texto'));
        $eventos = DB::table('eventos')
            ->join('deportes', 'eventos.deporte_id', '=', 'deportes.id')
            ->select('eventos.*', 'deportes.nombre as nombreDeporte')
            ->where('nombreEvento', 'LIKE', '%' . $texto . '%')
            ->orWhere('ubicacionEvento', 'LIKE', '%' . $texto . '%')
            ->orderBy('nombreEvento', 'asc')
            ->paginate(5);

        return view('eventos.lista', compact('eventos', 'texto'));
    }

    public function actualizar(PerfilRequest $request)
    {

        return DB::transaction(function () use ($request) {

            $user = $request->user();
            //dd($user);
            $user->fill($request->validated());
            //dd($user);

            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
                $user->sendEmailVerificationNotification();

            }
            $foto = $user->foto;
            //dd($request);
            if ($request->hasFile('foto')) {

                $destinationPath = 'image/';
                $fotoPerfil = date('YmdHis') . "." . $foto->getClientOriginalExtension();
                $foto->move($destinationPath, $fotoPerfil);
                $user->foto = $fotoPerfil;

            }

            $nacimiento = $request->fecha_nacimiento;

            $r = $request->rut;

            $p = Rut::parse($r)->format(Rut::FORMAT_ESCAPED);

            $rut = Rut::parse($p)->validate();
            //dd($r);

            if ($rut != true) {
                $request->session()->flash('error', 'Ingresa un rut valido!');
                return redirect()->back();
            }
            $deporteSeleccionado = $request->deporte_id;

            //dd($deporteSeleccionado);

            $dep = DB::table('usuarios_deportes')
                ->where('usuario_id', $user->id)
                ->get();

            if ($deporteSeleccionado == null) {
                foreach ($dep as $d) {
                    //dd($d->usuario_id);
                    DB::table('usuarios_deportes')->where('usuario_id', $d->usuario_id)->delete();
                }
            } elseif ($dep->isEmpty()) {
                //dd($user->id);
                foreach ($deporteSeleccionado as $deporte) {
                    # code...
                    $deportesFind = Deporte::findOrFail($deporte);
                    DB::table('usuarios_deportes')->insert([
                        'nombre' => $deportesFind->nombre,
                        'deporte_id' => $deportesFind->id,
                        'usuario_id' => $user->id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }

            } else {

                if ($deporteSeleccionado != null) {

                    foreach ($dep as $d) {
                        //dd($d->usuario_id);
                        DB::table('usuarios_deportes')->where('usuario_id', $d->usuario_id)->delete();
                    }

                    foreach ($deporteSeleccionado as $deporte) {

                        $deportesFind = Deporte::findOrFail($deporte);

                        DB::table('usuarios_deportes')->insert([

                            'nombre' => $deportesFind->nombre,
                            'deporte_id' => $deportesFind->id,
                            'usuario_id' => $user->id,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);

                    }

                    //dd($deporteSeleccionado);

                }
            }
            $edad = Carbon::parse($nacimiento)->age;

            $user->rut = $p;
            $user->edad = $edad;

            $user->save();

            return redirect()
                ->route('editar.perfil')
                ->withSuccess('Perfil Editado!');

        }, 5);
    }

    public function verPerfilPublico($usuario)
    {

        $user = User::findOrFail($usuario);
        //dd($user->id);

        $eventos = DB::table('eventos')
            ->join('deportes', 'eventos.deporte_id', '=', 'deportes.id')
            ->select('eventos.*', 'deportes.nombre as nombreDeporte', 'deportes.link as link')
            ->where('usuario_id', $user->id)
            ->paginate(5);
        //dd($user);
        return view('perfil.verPerfilPublico', compact('eventos', 'user'));

    }

}
