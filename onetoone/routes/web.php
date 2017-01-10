<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\User;
use App\Address;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function(){
	$user 		= User::findOrFail(1);
	$name 		= ['name'=> '1234 Houston']; 
	$address 	= new Address($name); 
	$user->address()->save($address);
});

Route::get('/update', function(){
	$address 		= Address::where('user_id', 1)->first();
	$address->name = 'updated address';
	$address->save();
});

Route::get('/read', function(){
	$user = User::findOrFail(1);
	echo $user->address->name;
});

Route::get('/delete', function(){
	$user = User::findOrFail(1);
	$user->address->delete();
	return 'done';
});