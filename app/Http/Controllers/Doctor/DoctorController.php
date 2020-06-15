<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('doctor');
    }

    public function index()
    {
        
         // $patient = DB::table('patientsinstance')
         //    ->select('patients.*','patientsinstance.*')

         //    ->join('patients', 'patientsinstance.patientsid', '=','patients.mssnid' )
         //    ->get();
        $patient = DB::table('patients')->get();
       
            // dd($patient);
         return view('doctor', ['patients'=> $patient,'p'=> $patient]);
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
        
        $q =DB::table('users')->where('id',$id)->update($data);
        return redirect('/doctor');
    }
}
