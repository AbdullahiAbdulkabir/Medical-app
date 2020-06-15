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
        // $p = DB::table('patients')->get();

        $users = DB::table('users')->get();
        if (Auth::user()->status==User::ADMIN) {
          return view('home', ['patients'=> $patient,'users'=> $users]);

        }elseif (Auth::user()->status==User::RECORD_OFFICER) {
          return view('/ro', ['patients'=> $patient]);   
        }else{

        return view('/'.strtolower(Auth::user()->status), ['patients'=> $patient]);   
        }

        
    }

    public function update(Request $request)
    {
        $request->validate([
             'fname' => 'required|string|max:255',
            'sname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'status' => 'string',
            'password' => 'required|string|min:6',

        ]);
        
        $id=$request->input('id');
        $fname=$request->input('fname');
        $sname=$request->input('sname');
        $email=$request->input('email');
        $status=$request->input('status');
        $password=$request->input('password');
        $data = array( 
            'first_name' => $fname,
            'surname' => $sname,
            'email' => $email,
            'status' => $status,
            'password' => bcrypt($password)
         );
        $p = DB::table('patients')->get();
        $q =DB::table('users')->where('id',$id)->update($data);
        if($status=='Admin'){
        return redirect('/home', ['p'=> $p]);
        }elseif ($status=='Nurse') {
        return redirect('/nurse', ['p'=> $p]);
        }elseif ($status=='Doctor') {
        return redirect('/doctor', ['p'=> $p]);
        }
    }
}
