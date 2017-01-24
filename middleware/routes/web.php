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
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    $user = Auth::user();
    //echo $user->isAdmin();
    
});

Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/admin', 'AdminController@index');

Route::get('/admin/user/roles', ['middleware'=>['web'], function(){
	return 'Middleware role';
}]);




