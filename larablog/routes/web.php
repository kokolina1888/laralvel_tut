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

Route::get('/', 'PostsController@index')->name('posts.index');
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');
Route::get('/posts', 'PostsController@create')->name('posts.create');
Route::post('/posts', 'PostsController@store')->name('posts.store');

Route::post('/posts/{post}/comments', 'CommentsController@store')->name('comments.store');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/register', 'RegistrationController@create');
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::post('/register', 'RegistrationController@store')->name('register');
Route::name('logout')->get('/logout', 'SessionsController@destroy');
//Route::get('/posts/tags/{tag}', 'PostsController@index');
