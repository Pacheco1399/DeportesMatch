<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $eventos = DB::table('eventos')
            ->join('deportes', 'eventos.deporte_id', '=', 'deportes.id')
            ->select('eventos.*', 'deportes.nombre as nombreDeporte', 'deportes.link as link')
            ->get();

        $participantes_eventos = DB::table('participantes_eventos')
            ->join('eventos', 'participantes_eventos.evento_id', '=', 'eventos.id')
            ->join('users', 'participantes_eventos.usuario_id', '=', 'users.id')
            ->select('participantes_eventos.*', 'users.name as nombre', 'users.apellido_paterno as apellidoPaterno', 'users.apellido_materno as apellidoMaterno')
            ->get();

        //dd($participantes_eventos);

        return view('home')->with([
            'eventos' => $eventos,
            'participantes_eventos' => $participantes_eventos,
        ]);

    }
    public function indexMod()
    {
        return view('user.homeMod');
    }

    public function foto()
    {
        return $this->morphOne(Foto::class, 'imageable');
    }

    public function getFotoPerfilAttribute()
    {

        return $this->foto
        ? "fotos/{$this->Foto->path}"
        : 'https://www.gravatar.com/avatar/404?d=mp';
    }
}
