<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class DoctorMiddleware
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
        if (Auth::check() && Auth::user()->status == 'Admin') {
            return redirect()->route('home');
        }
        elseif (Auth::check() && Auth::user()->status == 'Doctor') {
            return $next($request); 
            // return redirect()->route('doctor');
        }
        elseif (Auth::check() && Auth::user()->status == 'Nurse') {
            return redirect()->route('nurse');
        }
        elseif (Auth::check() && Auth::user()->status == 'Pharmacists') {
            return redirect()->route('pharmacists');
        }
        elseif (Auth::check() && Auth::user()->status == 'Record Officer') {
        }
        elseif (Auth::check() && Auth::user()->status == 'Lab Scientist') {
            return redirect()->route('lab');
        }
        else {
            return redirect()->route('login');
        }
    }
}
