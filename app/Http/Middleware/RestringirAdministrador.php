<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class restringirAdministrador
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
            return redirect()->route('administrador');
        }

        if (Auth::check() && Auth::user()->rol == 2) {
            return $next($request);
        }

        if (Auth::check() && Auth::user()->rol == 3) {
            return $next($request);
        }

    }
}
