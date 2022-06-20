<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complejos_deportivo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'ubicacion',
        'cantCanchas',
        'usuario_id',
    ];

}
