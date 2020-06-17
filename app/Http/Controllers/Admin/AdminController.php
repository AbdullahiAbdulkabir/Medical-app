<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware(['auth','admin']);
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $patient = DB::table('patients')->get();
 
    $users = DB::table('users')->get();
    
    if (Auth::user()->status==User::ADMIN) {
      return view('admin.index', ['patients'=> $patient,'users'=> $users]);

    }
    // elseif (Auth::user()->status==User::RECORD_OFFICER) {
    //   return view('ro', ['patients'=> $patient]);   
    // }else{

    // return view('/'.strtolower(Auth::user()->status), ['patients'=> $patient]);   
    // }
  }


  public function update(Request $request)
  {
      $request->validate([
        'first_name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'status' => 'string',
        'password' => 'required|string|min:6',

      ]);

      $data = array( 
          'first_name' => $request->input('first_name'),
          'surname' => $request->input('surname'),
          'email' => $request->input('email'),
          'status' => $request->input('status'),
          'password' => bcrypt($request->input('password'))
       );

      $user =DB::table('users')->where('id',$request->input('id'))->update($data);
      
      if($user){
        return redirect()->route('home')->with('message','Profile updated');
      }else{
        return redirect()->route('home')->with('error','An error occured');
      }
      
  }
}
