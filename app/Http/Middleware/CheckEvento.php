<?php

namespace App\Http\Middleware;

use App\Models\comentarioEventos;
use App\Models\Evento;
use Auth;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class CheckEvento
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $eventos = Evento::all();
        $fechaAll = Carbon::now()->setTimezone('America/Santiago');
        //dd( $fechaAll->toDateString() );
        $fecha = $fechaAll->toDateString();
        //dd($fecha);
        $hora = $fechaAll->toTimeString();
        foreach ($eventos as $e) {

            if (Auth::check() && $fecha == $e->fechaEvento) {
                if ($hora >= $e->horaEvento) {
                    $comentariosEvento = ComentarioEventos::where('evento_id', $e->id)->get();
                    if ($comentariosEvento->isEmpty()) {
                        //dd($comentariosEvento);

                        $even = Evento::findOrFail($e->id);
                        $even->estado = 2;
                        $even->save();
                    } else {
                        $even = Evento::findOrFail($e->id);
                        $even->estado = 3;
                        $even->save();

                    }
                }
            }
            if (Auth::check() && $fecha > $e->fechaEvento) {
                $even = Evento::findOrFail($e->id);
                //dd($even->estado);
                $even->estado = 2;
                $even->save();
            }

        }
        //dd($e);

        return $next($request);
    }
}
