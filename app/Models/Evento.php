<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Evento extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'nombreEvento',
        'fechaEvento',
        'horaEvento',
        'estado',
        'ubicacionEvento',
        'participantesTotales',
        'deporte_id',
        'usuario_id',
        'complejo_id',

    ];
}
