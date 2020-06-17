<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class NurseController extends Controller
{

    public function __construct()
    {
        $this->middleware('nurse');
    }

    public function index()
    {
         $patient = DB::table('patientsinstance')
            ->select('patients.*','patientsinstance.*')

            ->join('patients', 'patientsinstance.patientsid', '=','patients.mssnid' )
            ->get();
    	$p = DB::table('patients')->get();
         return view('nurse', ['patients'=> $patient,'p'=> $p]);
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
        return redirect('/home');
    }
    public function admit(Request $request, $mssnid)
    {
     
      $request->validate([
        'mssnid' => 'unique:patientsinstance,patientsId',]);
       $patient = DB::table('patients')
            ->select('patients.*')
            // ->join('patientsinstance', 'patientsinstance.patientsid', '=', 'patients.mssnid')
            ->where('mssnid',$mssnid)
            ->get();
      return view('userpatient', ['patient'=> $patient]);
    }

     public function admitted(Request $request)
    {
         $request->validate([
        'mssnId' => 'required|unique:patientsinstance,patientsId',
        'complaint' => 'required|unique:patientsinstance,patientsId',
        ]);
        $mssnid=$request->input('mssnId');
        $complaint=$request->input('complaint');
        
        $admit= '1';
       
      DB::table('patients')->where('mssnid',$mssnid)->update(['complaint'=>$complaint]); 
      DB::table('patientsinstance')->insert(['complaint'=>$complaint,'patientsId'=>$mssnid,'admit'=>$admit]);
        return redirect('nurse')->with('message', $mssnid.' Amitted');     
    }

     public function attend($mssnid)
    {
       $patient = DB::table('patients')
            ->select('patients.*','patientsinstance.*')
            ->join('patientsinstance', 'patientsinstance.patientsid', '=', 'patients.mssnid')
            ->where('mssnid',$mssnid)
            ->get();
   
        return view('attendpatient',['patientdet'=>$patient]);    
    }

    public function updatemedical()
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
      $mssnid = $request->input('mssnId');

      DB::table('patientsinstance')->where('patientsId',$mssnid)->update(['clerking'=>$clerk]); 
       return redirect('nurse/attend/'. $mssnid)->with('message', $mssnid.' pinned');
      
    }
    public function sendrphar(Request $request)
    {
          $request->validate([
             'sendToPharmacy' => 'required|string|max:255',
             'doctorseen' => 'string|max:255',

        ]);         
      $mssnid = $request->input('mssnId');
      $sendToPharmacy = $request->input('sendToPharmacy');
        $doctorseen = $request->input('doctorseen');
      DB::table('patientsinstance')->where('patientsId',$mssnid)->update(['doctorRemarkpha'=>$sendToPharmacy,'seenDoctor'=>$doctorseen]); 
            return redirect('nurse')->with('message', $mssnid.' Sent to pharmacy');
        
    }
    public function sendrlab(Request $request)
    {
       $request->validate([
             'sendToLab' => 'required|string|max:255',
        ]); 
       date_default_timezone_set('Africa/Lagos');
        $time = date('j F Y h:i:s A');
      $mssnid = $request->input('mssnId');
        $sendToLab = $request->input('sendToLab');
      $doctorseen = $request->input('doctorseen');
      DB::table('patientsinstance')->where('patientsId',$mssnid)->update(['doctorRemarklab'=>$sendToLab,'seenDoctor'=>$doctorseen,'labrequestdate'=>$time]); 
         return redirect('nurse')->with('message', $mssnid.' Sent to lab');
        
    }

     public function newpatient(Request $request)
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
       return redirect('nurse')->with('message', 'Patient created');
            
    }


    public function discharge(Request $request,$mssnid)
    {
        $admit= '0';
      DB::table('patientsinstance')->where('patientsId',$mssnid)->update(['admit'=>$admit]); 
      DB::table('patients')->where('mssnid',$mssnid)->update(['Active'=>$admit]); 
        return redirect('nurse')->with('message', $mssnid.' :Patient Discharged');     

    }
}
