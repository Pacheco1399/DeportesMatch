<?php

namespace App\Models;

use App\Models\Deporte;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDeporte extends Model
{
    use HasFactory;
    public function tipoDeportes(){
        return $this->belongsToMany(Deporte::class);

    }
}
