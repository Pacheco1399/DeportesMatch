<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\Equipo;


use Illuminate\Http\Request;



class updateEquipo
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
        $equipo = Equipo::findOrFail($request->route('equipo'));
        //dd($equipo->usuario_id);

        if (Auth::user()->id == $equipo->usuario_id) {
            return $next($request);
        }
        if(Auth::user()->id != $equipo->usuario_id)
        {
            return back();
        }

    }
}
