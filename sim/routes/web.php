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

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('auth.login');
});


Auth::routes();

Route::resource('backend/users', 'Backend\UsersController', ['except'=>['show']]);
Route::get('backend/users/{users}/confirm', ['as' => 'backend.users.confirm', 'uses' => 'Backend\UsersController@confirm']);

Route::resource('backend/pages', 'Backend\PagesController', ['except'=>['show']]);
Route::get('backend/pages/{pages}/confirm', ['as' => 'backend.pages.confirm', 'uses' => 'Backend\PagesController@confirm']);


Route::resource('backend/blog', 'Backend\BlogController', ['except'=>['show']]);
Route::get('backend/blog/{pages}/confirm', ['as' => 'backend.blog.confirm', 'uses' => 'Backend\BlogController@confirm']);



//Route::get('/home', 'HomeController@index');
Route::get('backend/dashboard', [
	'as' 	=> 'backend.dashboard',
	'uses'	=> 'Backend\DashboardController@index',
	]);