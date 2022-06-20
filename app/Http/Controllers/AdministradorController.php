<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Deporte;
use Carbon\Carbon;
use Freshwork\ChileanBundle\Rut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdministradorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrador');
    }

    public function index()
    {
        return view('admin');
    }

    public function crearUsuario()
    {
        return view('crearUsuario');
    }
    public function almacen(Request $request)
    {
        $r = $request->rut;

        //$rutV = Str::replaceLast('-', '', $r);
        //dd($r);
        $p = Rut::parse($r)->format(Rut::FORMAT_ESCAPED);

        $rut = Rut::parse($p)->validate();

        if ($rut != true) {
            $request->session()->flash('error', 'Ingresa un rut valido!');
            //DB::table('users')->where('id', $user->id)->update(['rut' => $p]);
            return redirect()->back();
        }

        $usuario = User::create(request()->all());

        return redirect()->route('verUsuarios');

    }

    public function verUsuarios(Request $request)
    {

        $u = $request->user();
        //$usuarios = User::orderBy('id', 'DESC');
        $user = DB::table('users')->where('id', '<>', $u->id)->get();
        //dd($user->);

        //return view('verUsuarios', compact('usuarios'));
        return view('verUsuarios')->with([
            'user' => $user,
            'depo' => Deporte::all(),
        ]);
    }

    public function actualizar(Request $request)
    {
        $idUsuario = $request->id;
        $ban = $request->ban;

        $motivo = $request->motivo;
        $motivo2 = $request->motivo2;
        $ban_date = Carbon::now();
        $time = $request->ban;
        //$ban_date->addHours($time);v
        $ban_date->addMinutes(2);
        //dd($ban_date);
        $us = User::findOrFail($idUsuario);

        if ($ban != 'perma') {
            $ban_time = $ban * 60;

            //dd($idUsuario);
            //DB::table('users')->where('id', $idUsuario)->update(['estado' => $bann]);
            $us->estado = 2;
            $us->ban_time = $ban_time;
            $us->motivo = $motivo;
            $us->ban_date = $ban_date;

        } elseif ($ban == 'perma') {
            $us->estado = 3;
            $us->ban_time = 99999999999999;
            $us->motivo = $motivo2;
            $us->ban_date = $ban_date;

        }

        $us->save();

        return redirect()
            ->route('verUsuarios');

    }

    public function ban(Request $request)
    {
        $id = $request->id;
        $ban = $request->ban_time;

        $us = User::findOrFail($id);

        $ban_time = Carbon::now();

        $ban_time->addMinutes($ban);
        $us->ban_time = $ban_time;
        $us->estado = 2;
        $us->save();

        return redirect()
            ->route('verUsuarios');
        //dd($ban_time);

    }

    public function activar(Request $request)
    {
        $id = $request->id;

        $us = User::findOrFail($id);
        $estado = $request->estado;
        //dd('');

        $us->estado = $estado;
        $us->motivo = null;
        $us->ban_time = null;
        $us->ban_date = null;
        $us->save();

        return redirect()
            ->route('verUsuarios');

    }

    public function cambiarRol(Request $request)
    {
        
        $user = User::findOrFail($request->usuario_id);
        $rol = (int)$request->rol;
        //dd($rol);

        $user->rol = $rol;

        $user->save();

        return redirect()
            ->route('verUsuarios');
    }

}
