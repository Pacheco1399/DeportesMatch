<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\Evento;

class updateEvento
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
        //dd($request->route());
        $evento = Evento::findOrFail($request->route('evento'));

        if (Auth::user()->id == $evento->usuario_id) {
            return $next($request);
        }
        if(Auth::user()->id != $evento->usuario_id)
        {
            return back();
        }
    }
}
