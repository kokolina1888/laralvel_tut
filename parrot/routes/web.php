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


Route::resource('lists', 'ListsController');

Route::get('contact', 
	['as'=>'contact', 'uses'=>'AboutController@Create']);
Route::post('contact', 
	['as'=>'contact_store', 'uses'=>'AboutController@store']);

Route::resource('lists', 'ListsController');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Auth::routes();

Route::get('/home', 'HomeController@index');
