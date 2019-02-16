<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class PharmacistsController extends Controller
{
    public function __construct()
    {
        $this->middleware('pharmacists');
    }

    public function index()
    {
    	 $patient = DB::table('patientsinstance')
            ->select('patients.*','patientsinstance.*')
            ->join('patients', 'patientsinstance.patientsid', '=','patients.mssnid' )
            ->get();
        $p = DB::table('patients')->get();
         return view('pharmacists', ['patients'=> $patient,'p'=> $p]);
    }

    public function prescribe($mssnid)
    {
         $patient = DB::table('patientsinstance')
            ->select('patients.*','patientsinstance.*')
            ->join('patients', 'patientsinstance.patientsid', '=','patients.mssnid' )
            ->get();
         return view('pharmacistpatient', ['patients'=> $patient]);
        
    }
    public function prescribed(Request $Request)
    {
         $request->validate([
             'issueddrug' => 'required|string|max:255',
        ]); 
       date_default_timezone_set('Africa/Lagos');
        $time = date('j F Y h:i:s A');
      $mssnid = $request->input('mssnId');
        $issueddrug = $request->input('sendToLab');
      DB::table('patientsinstance')->where('patientsId',$mssnid)->update(['issuedDrugs'=>$issueddrug,'issuedDrugsDate'=>$time]); 
         return redirect('pharmacists')->with('message', $mssnid.' prescribed|Issued Drugs');
    }
}
