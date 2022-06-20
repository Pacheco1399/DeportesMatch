<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puntuacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'posicion',
        'estado',
        'torneo_id',
        'equipo_id',
    ];

    
   
}
