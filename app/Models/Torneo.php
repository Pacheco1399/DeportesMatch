<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion_torneo',
        'fecha',
        'hora',
        'usuario_id',
        'cantidad_equipos',
        'deporte_id',
        'tipo_torneo',
        'inscritos',
    ];
}
