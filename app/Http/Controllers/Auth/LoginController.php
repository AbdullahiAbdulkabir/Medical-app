<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

     public function showLoginView()
    {
        return view('auth.login');
    }

    use AuthenticatesUsers{
        logout as doLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo ='/home';
    // public function redirectTo()
    // {
        
    // }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   
   public function userLogin(Request $request)
   {
        $request->validate([
            'email'=>'required|email|max:255',
            'password'=>'required|min:6'
        ]);
         $user = User::where('email',$request->email)->first();
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            $defaultRoute = 'admin/home';
            $role= $user->status;
            switch ($role) {
                case User::ADMIN:
                    $defaultRoute='/admin/home';
                    break;
                case User::DOCTOR:
                    $defaultRoute ='/doctor';
                  
                    break;
                 case User::NURSE:
                     $defaultRoute='/nurse';
                    break;
                case User::PHARMACIST:
                     $defaultRoute='/pharmacist';
                    break;
                case User::RECORD_OFFICER:
                     $defaultRoute='/ro';
                    break;
                case User::LAB_SCIENTIST:
                     $defaultRoute='/lab';
                    break;
                default:
                      $defaultRoute='/login';
                    break;
            }
            return redirect(url($defaultRoute));
        }else{
            return redirect()->route('login')->with('error','Invalid login credentials');
        }
   }
   public function logout(Request $request)
    {
        $this->doLogout($request);
        return redirect()->route('login');
    }
}
