<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioEventos extends Model
{
    use HasFactory;
    protected $fillable = [
        'comentario',
        'valoracion',
        'usuario_id',
        'evento_id',
    ];
}
