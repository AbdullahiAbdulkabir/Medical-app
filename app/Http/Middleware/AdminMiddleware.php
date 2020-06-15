<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status == User::ADMIN) {
            return $next($request); 
        }
        elseif (Auth::check() && Auth::user()->status == User::DOCTOR) {
           
            return redirect()->route('doctor');
        }
        elseif (Auth::check() && Auth::user()->status == User::NURSE) {
            return redirect()->route('nurse');
        }
        elseif (Auth::check() && Auth::user()->status == User::PHARMACIST) {
            return redirect()->route('pharmacist');
        }
        elseif (Auth::check() && Auth::user()->status == User::RECORD_OFFICER) {
            return redirect()->route('ro');
        }
        elseif (Auth::check() && Auth::user()->status == User::LAB_SCIENTIST) {
            return redirect()->route('lab');
        }
        else {
            return redirect()->route('login');
        }
    }
}
