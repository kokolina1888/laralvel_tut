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
use Carbon\Carbon;
use App\User;
use App\Post;

Route::get('/', function () {
    return view('welcome');
});

//CRUD Application
Route::group(['middleware'=>'web'], function(){
	Route::resource('/posts', 'PostsController');
});

Route::get('/dates', function(){
	$play = Carbon::now()->diffForHumans();
	echo $play;
});

Route::get('/getname', function(){
	$user = User::find(1);
	echo $user->name;
});

Route::get('/setname', function(){
	$user = User::find(6);
	$user->name = 'Long d';
	$user->save();
	
	 });