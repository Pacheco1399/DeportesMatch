<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Foto;
use App\Models\User;

class Usuarios
{
    public function get()
    {

        $usuarios = DB::select('select * from users where rol = ?', [3]);

        return $usuarios;
    }

    public function foto()
    {
        return $this->morphOne(Foto::class, 'imageable');
    }
    
    
    public function getFotoUsuarioAttribute()
    {

        return $this->foto
            ? "fotos/{$this->Foto->path}"
            : 'https://www.gravatar.com/avatar/404?d=mp';
    }

}
