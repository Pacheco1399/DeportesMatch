<?php

namespace App\Http\Middleware;

use App\Models\User;
use Auth;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class CheckBanned
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

        if (Auth::check() && Auth::user()->ban_time && Carbon::now()->lessThan(Auth::user()->ban_time)) {
            Auth::logout();

            // invalidamos su sesión
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            // redireccionamos a donde queremos
            return redirect()->route('login')->with('error', 'Tu cuenta ha sido suspendida temporalmente');
        } else {
            if (Auth::check() && Auth::user()->ban_date && Carbon::now()->lessThan(Auth::user()->ban_date)) {
                $ban_day = Carbon::now()->diffInDays(Auth::user()->ban_date);
                // usuario con sesión iniciada pero inactivo

                // cerramos su sesión
                Auth::logout();

                // invalidamos su sesión
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                // redireccionamos a donde queremos
                return redirect()->route('login')->with('error', 'Tu cuenta ha sido suspendida temporalmente');
            }
        }
        if (Auth::check()) {
            $id = Auth::user()->id;
            $us = User::findOrFail($id);
            $us->estado = 1;
            $us->save();
        }

        return $next($request);
    }
}
