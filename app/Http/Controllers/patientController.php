<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{

  public function __construct()
  {
      $this->middleware('doctor');
  }

  public function newPatient(Request $request)
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
     $result= DB::table('patients')->insert($patient); 
     
    if($result){
        return redirect()->route('doctor')->with('message','Patient created');
    }else{
        return redirect()->route('doctor')->with('error','An error occured');
    }
        	
  }
 
 public function attend($mssnid)
  {
    $patient = DB::table('patients')
      ->select('patients.*','patientsinstance.*')
      ->join('patientsinstance', 'patientsinstance.patientsid', '=', 'patients.mssnid')
      ->where('mssnid',$mssnid)
      ->get();
 
      return view('attendpatient',['patient_details'=>$patient]);    
  }

  public function updateMedical(Request $request)
  {
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

     $result= DB::table('patients')->insert($patient); 
  }
  
  public function clerk(Request $request)
  {
    $clerk = $request->input('clerk');
    $mssn_id = $request->input('mssnId');

    DB::table('patientsinstance')->where('patientsId',$mssn_id)->update(['clerking'=>$clerk]); 
     return redirect('doctor/attend/'. $mssn_id)->with('message', $mssn_id.' pinned');
    
  }
  public function sendToPharmacy(Request $request)
  {
	  $request->validate([
         'sendToPharmacy' => 'required|string|max:255',
         'doctorseen' => 'string|max:255',

    ]);	    	
  $mssn_id = $request->input('mssnId');
  $sendToPharmacy = $request->input('sendToPharmacy');
	$doctorseen = $request->input('doctorseen');
  DB::table('patientsinstance')->where('patientsId',$mssn_id)->update(['doctorRemarkpha'=>$sendToPharmacy,'seenDoctor'=>$doctorseen]); 
		return redirect('doctor')->with('message', $mssn_id.' Sent to pharmacy');
  	
  }
  public function sendToLab(Request $request)
  {
    $request->validate([
         'sendToLab' => 'required|string|max:255',
    ]); 
    date_default_timezone_set('Africa/Lagos');
    $time = date('j F Y h:i:s A');
    $mssn_id = $request->input('mssnId');
  	$sendToLab = $request->input('sendToLab');
    $doctorseen = $request->input('doctorseen');
    DB::table('patientsinstance')->where('patientsId',$mssn_id)->update(['doctorRemarklab'=>$sendToLab,'seenDoctor'=>$doctorseen,'labrequestdate'=>$time]); 
	 return redirect('doctor')->with('message', $mssn_id.' Sent to lab');
	
  }

  public function admit(Request $request, $mssn_id)
  {
    $request->validate([
      'mssnid' => 'unique:patientsinstance,patientsId'
    ]);
    $patient = DB::table('patients')
      ->select('patients.*')
      // ->join('patientsinstance', 'patientsinstance.patientsid', '=', 'patients.mssnid')
      ->where('mssnid',$mssn_id)
      ->get();
    return view('userpatient', ['patient'=> $patient]);
  }

  public function admitted(Request $request)
  {
    $request->validate([
    'mssnId' => 'required|unique:patientsinstance,patientsId',
    'complaint' => 'required|unique:patientsinstance,patientsId',
    ]);
    $mssn_id=$request->input('mssnId');
    $complaint=$request->input('complaint');
    
    $admit= '1';
     
    DB::table('patients')->where('mssnid',$mssn_id)->update(['complain'=>$complaint]); 
    DB::table('patientsinstance')->insert(['complain'=>$complaint,'patientsId'=>$mssn_id,'admit'=>$admit]);
  	return redirect('doctor')->with('message', $mssn_id.' Amitted'); 	
  }

  public function delegates()
  {

   $delegates = DB::table('personal')
      ->where('date_registered','>=','2017-09-29')
      ->whereNotIn('ailments',['Not Applicable','Not Listed','#'])->paginate(155);

   return view('delegate.index',['delegates'=>$delegates]);
  }
}
