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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', 'HomeController@index');


// Route::get('admin/users/create', 'AdminUsersController@create');
// Route::post('admin/users/store', 'AdminUsersController@store');
Route::get('/admin/', function(){
	return view('admin.index');
});

Route::resource('admin/users', 'AdminUsersController');
Route::get('admin/users',['as' => 'admin-users-index', 'uses' => 'AdminUsersController@index']);
Route::get('admin/users/create',['as' => 'admin-users-create', 'uses' => 'AdminUsersController@create']);
Route::get('admin/users/edit',['as' => 'admin-users-edit', 'uses' => 'AdminUsersController@edit']);



