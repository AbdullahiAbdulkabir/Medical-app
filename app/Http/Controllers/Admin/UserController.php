<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showRegisterView()
    {
        return view('auth.register');
    }

    public function create(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'sname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'status' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'first_name' => $request->fname,
            'surname' => $request->sname,
            'email' => $request->email,
            'status' => $request->status,
            'password' => bcrypt($request->password),
           
        ]);

        if($user){
            return redirect('/admin/home');
        }

    }

    public function delete($id)
    {
        $user = DB::table('users')->find($id)->delete();;
       if ($user) {
          return redirect('/admin/home')->with('message','User Deleted');   
        }
            
    }
}
