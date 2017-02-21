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
use App\Http\Middleware\CheckRole;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/profile', 'ProfileController@update')->middleware('role:admin');

// Route::group(['middleware' => 'auth:all'], function()
//{
    $a = 'authenticated.';
    Route::get('/logout', ['as' => $a . 'logout', 'uses' => 'Auth\LoginController@logout']);
    Route::get('/admin', 'AdminController@getHome')->middleware('role:admin');
    
//});