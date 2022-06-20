<?php

namespace App\Services;

use App\Models\Region;

class Regiones
{
    public function get()
    {
        $regiones = Region::get();
        $regionesArray[''] = 'Selecciona una Region';

        foreach ($regiones as $region) {
            $regionesArray[$region->id] = $region->nombre;
        }
        return $regionesArray;
    }
}
