<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\URL;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;
    public function redirectTo()
    {
        $role= Auth::user()->status;
        switch ($role) {
            case 'Admin':
                $this->redirectTo='/home';
                return  $this->redirectTo;
                break;
            case 'Doctor':
                 $this->redirectTo='/doctor';
                return $this->redirectTo;
                break;
             case 'Nurse':
                 $this->redirectTo='/nurse';
                 return $this->redirectTo;   
                break;
            case 'Pharmacists':
                 $this->redirectTo='/pharmacists';
                return $this->redirectTo;
                break;
            case 'Record Officer':
                 $this->redirectTo='/ro';
                return $this->redirectTo;
                break;
            case 'Lab Scientist':
                 $this->redirectTo='/lab';
                return $this->redirectTo;
                break;
            default:
                  $this->redirectTo='/login';
                return $this->redirectTo;
                break;
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   
}
