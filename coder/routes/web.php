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

Auth::routes();

Route::get('/home', 'HomeController@index');

	// Route::resource('admin/users', 'AdminUsersController');
	Route::get('admin/users/', 'AdminUsersController@index')->name('admin.users.index');
	Route::get('admin/users/create', 'AdminUsersController@create')->name('admin.users.create');
	// Route::get('admin/users/{id}/edit', 'AdminUsersController@edit');
	// Route::put('admin/users/update/{id}', 'AdminUsersController@update');
		
	Route::get('admin/posts/', 'AdminPostsController@index')->name('admin.posts.index');
	Route::get('admin/posts/create', 'AdminPostsController@create')->name('admin.posts.create');





// Route::get('create', 'AdminUsersController@create');

// Route::get('/admin', function(){
// 	return view('admin.index');
// });
