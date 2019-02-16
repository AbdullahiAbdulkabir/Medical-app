<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
	if (!Auth::check() ||Auth::user()->status-> !='Admin') {
		# code...
		return redirect('login');
		return view('auth.register')
	}
}

