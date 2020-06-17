<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
class LabController extends Controller
{
    public function index()
    {
        
         $patient = DB::table('patientsinstance')
            ->select('patients.*','patientsinstance.*')
            ->join('patients', 'patientsinstance.patientsid', '=','patients.mssnid' )
            ->get();
       
         return view('lab', ['patients'=> $patient]);
    }
    public function test($mssnid)
    {
        $patient = DB::table('patientsinstance')->where('patientsId',$mssnid)->get();
    	
         return view('labpatient', ['patients'=> $patient]);

    }
     public function testsent(Request $request,$mssnid)
    {
         $request->validate([
        'result' => 'required',
        ]);
        date_default_timezone_set('Africa/Lagos');
        $time = date('j F Y h:i:s A');
        $result=$request->input('result');  
      	DB::table('patientsinstance')->where('patientsId',$mssnid)->update(['labresult'=>$result,'labresultdate'=>$time]); 
    	return redirect('lab')->with('message','Lab result sent for '. $mssnid);

        // return view('attendpatient',['patientdet'=>$patientdet,'patientinst'=>$patientinst]); 
    }
    public function history($mssnid)
    {
       $patient= DB::table('patientsinstance')->where('patientsId',$mssnid)->get(); 
       $p= DB::table('patients')->where('mssnid',$mssnid)->get(); 
      	return view('labHistory',['patient'=>$patient,'p'=>$p]);
    	
    }
}
