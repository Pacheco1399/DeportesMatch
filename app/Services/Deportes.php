<?php

namespace App\Services;

use App\Models\Deporte;

class Deportes
{
    public function get()
    {
        $deportes = Deporte::get();
        

        foreach ($deportes as $deporte) {
            $deportesArray[$deporte->id] = $deporte->nombre;
        }
        return $deportesArray;
    }
}
