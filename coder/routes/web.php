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
	
Route::get('admin/users/', 'AdminUsersController@index')->name('admin.users.index');
Route::get('admin/users/create', 'AdminUsersController@create')->name('admin.users.create');
	
Route::get('admin/posts/', 'AdminPostsController@index')->name('admin.posts.index');
Route::get('admin/posts/create', 'AdminPostsController@create')->name('admin.posts.create');

Route::get('admin/categories/', 'AdminCategoriesController@index')->name('admin.categories.index');
Route::get('admin/categories/create', 'AdminCategoriesController@create')->name('admin.categories.create');

Route::get('admin/medias/', 'AdminMediasController@index')->name('admin.medias.index');
Route::get('admin/medias/create', 'AdminMediasController@create')->name('admin.medias.create');



// Route::get('create', 'AdminUsersController@create');

// Route::get('/admin', function(){
// 	return view('admin.index');
// });
