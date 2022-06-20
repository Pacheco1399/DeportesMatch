<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;


    protected $fillable = [
        'nombreEquipo',
        'miembros',
        'foto',
        'capacidad',
        'descripcion',
        'privacidad',
        'usuario_id',
        'deporte_id',
        
    ];
}
