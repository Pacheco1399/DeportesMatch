<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integrantes_equipo extends Model
{
    use HasFactory;

    protected $fillable =[
        'cantidad',
        'usuario_id',
        'equipo_id',
        'fundador',
    ];
}
