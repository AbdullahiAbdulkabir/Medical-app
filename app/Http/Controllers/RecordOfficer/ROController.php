<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
class ROController extends Controller
{
     public function __construct()
    {
        $this->middleware('ro');
    }

    public function index()
    {
        $patient = DB::table('patients')->get();
         return view('ro', ['patients'=> $patient]);
    }
    public function record($mssnid)
    {
        $patient = DB::table('patients')->where('mssnid',$mssnid)->get();
         return view('patientpage', ['patients'=> $patient]);
    }
     public function edit($mssnid)
    {
        $patient = DB::table('patients')->where('mssnid',$mssnid)->get();
         return view('editPatient', ['patient'=> $patient]);
    }
     public function editpatient(Request $request, $mssnid)
    {
         $request->validate([
    'mssnId' => 'required|unique:patients|max:13',
    'firstname' => 'required|min:3',
    'othername' => 'min:2',
    'lastname' => 'required|min:3',
    'email' => 'required|email',
    'council' => 'required',
    'address' => 'required|min:3',
    'gender' => 'required|min:3',
    'dob' => 'required|min:3|date',
    'phone' => 'required|min:3',
    'occupation' => 'required|min:3',
    'marritalStatus' => 'required|min:3',
    
     ]);
    $patient = array(
    'mssnid' => $request->input('mssnId'),
    'firstname' => $request->input('firstname'),
    'othername' => $request->input('othername'),
    'lastname' => $request->input('lastname'),
    'email' => $request->input('email'),
    'areacouncil' => $request->input('council'),
    'address' => $request->input('address'),
    'gender' => $request->input('gender'),
    'phone' => $request->input('phone'),
    'dob' => $request->input('dob'),
    'occupation' => $request->input('occupation'),
    'maritalstatus' => $request->input('marritalStatus') );
     $result= DB::table('patients')->where('mssnid',$mssnid)->update($patient); 
       return redirect('ro')->with('message', 'Patient profile edited');
            
    }
}
