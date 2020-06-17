<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ROUTE TO LOGIN AND REISTER
Route::get('/', function () {
    return view('auth.login');
});

Route::prefix('login')->group(function(){
	Route::get('/', 'Auth\LoginController@showLoginView')->name('login');
	Route::post('/', 'Auth\LoginController@userLogin');
});

Route::post('logout','Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {

	//ROUTE FOR ADMIN 
	Route::prefix('admin')->group(function(){
		Route::prefix('register')->group(function(){
			Route::get('/', 'Admin\UserController@showRegisterView')->name('register');
			Route::post('/', 'Admin\UserController@create')->name('register');
		});
		Route::get('/home', 'Admin\AdminController@index')->name('home');
		Route::get('/delete/{mssnid}', 'Admin\UserController@delete');
		Route::post('/update', 'Admin\AdminController@update');
		Route::get('/profile',function(){
			return view('admin.edit');
		});
	});

	// ALL ROUTES FOR THE DOCTORS
	Route::prefix('doctor')->group(function(){
		Route::get('/', 'Doctor\DoctorController@index')->name('doctor');
		Route::prefix('patient')->group(function(){
			Route::get('/',function(){
				return view('patient.create');
			});	
		});
		
		Route::get('/profile',function(){
		return view('update');
		});
		Route::get('/attend/{id}', 'PatientController@attend');
		Route::post('/update', 'Doctor\DoctorController@update');
		Route::post('/create', 'PatientController@newpatient');
		Route::get('/admit/{mssnid}', 'PatientController@admit');
		Route::post('/admitted/', 'PatientController@admitted');
		Route::post('/send', 'PatientController@sendToPharmacy');
		Route::post('/sendl', 'PatientController@sendToLab');
		Route::get('/delegates','PatientController@delegates');
	});

	// Route::get('/ad', function(){
	//     return view('AddRecord');
	// });


	Route::post('/clerk', 'PatientController@clerk');


	// ALL ROUTES FOR THE NURSES
	Route::prefix('nurse')->group(function(){
		Route::get('/', 'Nurse\NurseController@index')->name('nurse');
		Route::post('/update', 'Nurse\NurseController@update');
		Route::get('/admit/{mssnid}', 'Nurse\NurseController@admit');
		Route::post('/admitted/', 'Nurse\NurseController@admitted');
		Route::get('/discharge/{mssnid}', 'Nurse\NurseController@discharge');
		Route::get('/addp',function(){
			return view('patient.create');
		});
		Route::post('/create', 'Nurse\NurseController@newpatient');
		Route::get('/attend/{id}', 'Nurse\NurseController@attend');
		Route::get('/nurse/profile',function(){
			return view('update');
		});
		Route::post('/send', 'Nurse\NurseController@sendrphar');
		Route::post('/sendl', 'Nurse\NurseController@sendrlab');
	});

	// ALL ROUTES FOR Pharmacists
	Route::prefix('pharmacist')->group(function(){
		Route::get('/', 'Pharmacist\PharmacistsController@index')->name('pharmacists');
		Route::get('/issue/{mssnid}', 'Pharmacist\PharmacistsController@prescribe');
	});

	// ALL ROUTES FOR LAB SCIENTISTS
	Route::prefix('lab')->group(function(){
		Route::get('/', 'Lab\LabController@index')->name('lab');
		Route::get('/test/{mssnid}', 'Lab\LabController@test');
		Route::post('/testsent/{mssnid}', 'Lab\LabController@testsent');
		Route::get('/history/{mssnid}', 'Lab\LabController@history');
		Route::get('/profile',function(){
			return view('update');
		});
	});

	// ALL ROUTES FOR Record Officer
	Route::prefix('ro')->group(function(){
		Route::get('/', 'RecordOfficer\RoController@index')->name('ro');
		Route::get('/record/{mssnid}', 'RecordOfficer\RoController@record')->name('ro');
		Route::get('/record/edit/{mssnid}', 'RecordOfficer\RoController@edit')->name('ro');
		Route::post('/record/edited/{mssnid}', 'RecordOfficer\RoController@editpatient')->name('ro');
	});
	Route::get('/test/',function(){
		return view('search');
	});

});


// Route::post('pharmacist/prescribed', 'PharmacistsController@prescribed');








