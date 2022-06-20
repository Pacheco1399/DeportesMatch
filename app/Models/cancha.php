<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cancha extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'complejo_id'
    ];
}
