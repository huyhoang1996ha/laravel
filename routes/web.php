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

Route::get('/', function () {
    return view('welcome');
});
Route::get('doctor2',function(){
	$doctor=App\doctor::find(2);
	echo $doctor->name;
});
Route::resource('doctor','DoctorController');
Route::resource('patient','PatientController');
Route::resource('disease','DiseaseController');
Route::get('menu',function(){
	return view('menu');
});
Route::get('ioc',function(){

	class Key 
	{
		
		function __construct($values=null)
		{
			# code...
			echo'thanh cong';
		}
	}
	class Computer 
	{
		protected $key;
		function __construct(Key $key)
		{
			# code...
			$this->key=$key;
		}
	}
	// app()->bind('computer','Computer');
	$patient=app('computer');
	
});

