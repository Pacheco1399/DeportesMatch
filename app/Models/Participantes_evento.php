<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participantes_evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'participantesTotales',
        'capacidadParticipantes',
        'usuario_id',
        'evento_id',
    ];
}
