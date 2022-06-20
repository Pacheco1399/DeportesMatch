<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;




    protected $fillable = [
        'title', 'description', 'fecha','start', 'end', 'cancha_id', 'complejo_id', 'evento_id'
    ];
}



