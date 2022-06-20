<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('usuario');
    }

    public function buscarUsuario()
    {
        
        return view('user.verUsuarios')->with([
            'usuarios' => User::all(),
        ]);
        
    }
    
    public function verUsuario(Request $request)
    {
        $user = $request->user();
        $texto = $request->texto;
        $usuarios = DB::table('users')
            ->select('users.*')
            ->Where('name', 'LIKE', '%' . $texto . '%')
            ->OrWhere('apellido_paterno', 'LIKE', '%' . $texto . '%')
            ->OrWhere('apellido_materno', 'LIKE', '%' . $texto . '%')
            ->paginate(5);
        
        return view('user.verUsuarios')->with([
            'usuarios' => $usuarios,
        ]);

    }

}
