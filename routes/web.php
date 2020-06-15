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
		Route::get('/delete/{mssnid}', 'UserController@delete');
	});

	Route::post('/update', 'HomeController@update');
	Route::get('/profile',function(){
		return view('update');
	});

	// ALL ROUTES FOR THE DOCTORS
	Route::prefix('doctor')->group(function(){
		Route::get('/', 'Doctor\DoctorController@index')->name('doctor');
		Route::get('/addp',function(){
			return view('newpatient');
		});
		Route::get('/profile',function(){
		return view('update');
		});
		Route::get('/attend/{id}', 'patientController@attend');
		Route::post('/update', 'Doctor\DoctorController@update');
		Route::post('/create', 'patientController@newpatient');
		Route::get('/admit/{mssnid}', 'patientController@admit');
		Route::post('/admitted/', 'patientController@admitted');
		Route::post('/send', 'patientController@sendrphar');
		Route::post('/sendl', 'patientController@sendrlab');
		Route::get('/delegates','patientController@delegates');
	});

	// Route::get('/ad', function(){
	//     return view('AddRecord');
	// });


	Route::post('/clerk', 'patientController@clerk');


	// ALL ROUTES FOR THE NURSES
	Route::prefix('nurse')->group(function(){
		Route::get('/', 'NurseController@index')->name('nurse');
		Route::post('/update', 'NurseController@update');
		Route::get('/admit/{mssnid}', 'NurseController@admit');
		Route::post('/admitted/', 'NurseController@admitted');
		Route::get('/discharge/{mssnid}', 'NurseController@discharge');
		Route::get('/addp',function(){
			return view('newpatient');
		});
		Route::post('/create', 'NurseController@newpatient');
		Route::get('/attend/{id}', 'NurseController@attend');
		Route::get('/nurse/profile',function(){
			return view('update');
		});
		Route::post('/send', 'NurseController@sendrphar');
		Route::post('/sendl', 'NurseController@sendrlab');
	});

	// ALL ROUTES FOR Pharmacists
	Route::prefix('pharmacist')->group(function(){
		Route::get('/', 'PharmacistsController@index')->name('pharmacists');
		Route::get('/issue/{mssnid}', 'PharmacistsController@prescribe');
	});

	// ALL ROUTES FOR LAB SCIENTISTS
	Route::prefix('lab')->group(function(){
		Route::get('/', 'labController@index')->name('lab');
		Route::get('/test/{mssnid}', 'labController@test');
		Route::post('/testsent/{mssnid}', 'labController@testsent');
		Route::get('/history/{mssnid}', 'labController@history');
		Route::get('/profile',function(){
			return view('update');
		});
	});

	// ALL ROUTES FOR Record Officer
	Route::prefix('ro')->group(function(){
		Route::get('/', 'RoController@index')->name('ro');
		Route::get('/record/{mssnid}', 'RoController@record')->name('ro');
		Route::get('/record/edit/{mssnid}', 'RoController@edit')->name('ro');
		Route::post('/record/edited/{mssnid}', 'RoController@editpatient')->name('ro');
	});
	Route::get('/test/',function(){
		return view('search');
	});

});


// Route::post('pharmacist/prescribed', 'PharmacistsController@prescribed');








