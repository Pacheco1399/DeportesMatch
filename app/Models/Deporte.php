<?php

namespace App\Models;

use App\Models\TipoDeporte;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deporte extends Model
{
    use HasFactory;

    public function deportes(){
        return $this->belongsToMany(TipoDeporte::class);
    }
}
