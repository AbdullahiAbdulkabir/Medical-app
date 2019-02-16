<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
  public function Register(Request $request)
  {
  	$request->validate([
  	'First_name' => 'required|min:3',
  	'Surname' => 'required|min:3',
  	'email' => 'required|unique:user|email',
  	'password' => 'required|min:3|confirmed',
  	'password_confirmation' => 'required'
     ]);
  	$fn=$request->input('First_name');
  	$sn=$request->input('Surname');
  	$email=$request->input('email');
  	$password=$request->input('password');
  	// $password =Hash::make($password);
  	// $results=DB::select("select * FROM user WHERE Email= ? ", [$email]);
  	// $Dbemail = DB::table('user')->where('Email', $email)->value('email');
  	// // print_r( $Dbemail);
  	
    
     $result= DB::insert('insert into user (First_name,Surname, Email, Password) values(?,?,?,?)', [$fn,$sn,$email,$password]);
     	echo "Record Created";

  }
  public function Login(Request $request)
  {
  	// $request->validate([
  	// 'email' => 'required',
  	// 'password' => 'trim'
   //   ]);
  	// // $email=$request->input('email');
  	// // $password=$request->input('password');
  	// // $Dbemail = DB::table('user')->where('Email', $email)->value('email');
  	// // // $Dbpass = DB::table('user')->where('Password', $password)->value('password');
   // //   // $result= DB::select('select * from user WHERE Email = ?', [$email]);
  	// // echo "$Dbemail";
  		
  		$credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('welcome');
     // if ($Dbemail==$email) {
     // 	return view('welcome');
     // }else{
     // 	echo "error";
     // // print_r( $result);
     // }
  	// echo "hy";
  } 
}

