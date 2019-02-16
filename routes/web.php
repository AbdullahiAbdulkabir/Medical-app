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
Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});

//ROUTE FOR ADMIN 
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/update', 'HomeController@update');
Route::get('/delete/{mssnid}', 'HomeController@delete');
Route::post('/add', 'HomeController@Add');
Route::get('/profile',function(){
	return view('update');
});
// ALL ROUTES FOR THE DOCTORS
Route::get('/doctor', 'DoctorController@index')->name('doctor');
Route::get('doctor/addp',function(){
	return view('newpatient');
});

// Route::get('/ad', function(){
//     return view('AddRecord');
// });
Route::get('/doctor/profile',function(){
	return view('update');
});
Route::get('/doctor/attend/{id}', 'patientController@attend');
Route::post('/nurse/update', 'NurseController@update');
Route::post('/doctor/update', 'DoctorController@update');
Route::post('/doctor/create', 'patientController@newpatient');
Route::get('/doctor/admit/{mssnid}', 'patientController@admit');
Route::post('/doctor/admitted/', 'patientController@admitted');
Route::post('/clerk', 'patientController@clerk');
Route::post('doctor/send', 'patientController@sendrphar');
Route::post('doctor/sendl', 'patientController@sendrlab');

// ALL ROUTES FOR THE NURSES
Route::get('/nurse', 'NurseController@index')->name('nurse');
Route::get('/nurse/admit/{mssnid}', 'NurseController@admit');
Route::post('/nurse/admitted/', 'NurseController@admitted');
Route::get('nurse/discharge/{mssnid}', 'NurseController@discharge');
Route::get('nurse/addp',function(){
	return view('newpatient');
});
Route::post('/nurse/create', 'NurseController@newpatient');
Route::get('/nurse/attend/{id}', 'NurseController@attend');
Route::get('/nurse/profile',function(){
	return view('update');
});
Route::post('nurse/send', 'NurseController@sendrphar');
Route::post('nurse/sendl', 'NurseController@sendrlab');

// ALL ROUTES FOR Pharmacists
Route::get('/pharmacists', 'PharmacistsController@index')->name('pharmacists');
Route::get('pharmacist/issue/{mssnid}', 'PharmacistsController@prescribe');

// ALL ROUTES FOR LAB SCIENTISTS
Route::get('/lab', 'labController@index')->name('lab');
Route::get('/lab/test/{mssnid}', 'labController@test');
Route::post('/lab/testsent/{mssnid}', 'labController@testsent');
Route::get('lab/history/{mssnid}', 'labController@history');
Route::get('/lab/profile',function(){
	return view('update');
});

// ALL ROUTES FOR RO
Route::get('/ro', 'RoController@index')->name('ro');
Route::get('ro/record/{mssnid}', 'RoController@record')->name('ro');
Route::get('ro/record/edit/{mssnid}', 'RoController@edit')->name('ro');
Route::post('ro/record/edited/{mssnid}', 'RoController@editpatient')->name('ro');


Route::get('/doctor/delegates','patientController@delegates');



// Route::post('pharmacist/prescribed', 'PharmacistsController@prescribed');








