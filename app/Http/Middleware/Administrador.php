<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class Administrador
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::check() && Auth::user()->rol == 1) {
            return $next($request);
        }
       

        if (Auth::check() && Auth::user()->rol == 2) {
            return redirect()->route('moderador');
        }

        if (Auth::check() && Auth::user()->rol == 3) {
            return redirect()->route('usuario');
        }

    }
}
