<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class pharmacistsMiddleware
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
            return redirect()->route('home');
        }
        elseif (Auth::check() && Auth::user()->status == User::DOCTOR) {
            return redirect()->route('doctor');
        }
        elseif (Auth::check() && Auth::user()->status == User::NURSE) {
            return redirect()->route('nurse');
        }
        elseif (Auth::check() && Auth::user()->status == User::PHARMACIST) {
            // return redirect()->route('pharmacist');
            return $next($request); 
        }
        elseif (Auth::check() && Auth::user()->status == User::RECORD_OFFICER) {
        }
        elseif (Auth::check() && Auth::user()->status == User::LAB_SCIENTIST) {
            return redirect()->route('lab');
        }
        else {
            return redirect()->route('login');
        }
    }
}
