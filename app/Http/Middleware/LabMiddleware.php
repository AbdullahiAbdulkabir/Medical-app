<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class LabMiddleware
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
            return redirect()->route('pharmacist');
        }
        elseif (Auth::check() && Auth::user()->status == User::RECORD_OFFICER) {
            return redirect()->route('ro');
        }
        elseif (Auth::check() && Auth::user()->status == User::LAB_SCIENTIST) { 
            return $next($request); 
        }
        else {
            return redirect()->route('login');
        }
    }
}
