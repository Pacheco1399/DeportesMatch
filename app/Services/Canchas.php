<?php

namespace App\Services;

use App\Models\Cancha;

class Canchas
{
    public function get($complejo)
    {

        $canchas = Cancha::all();
        

        foreach ($cancha as $c) {
            if ($c->complejo_id == $complejo) {
                $canchasArray[$c->id] = $c->nombre;
            }
        }
        return $canchasArray;
    }
}
