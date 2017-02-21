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

Route::get('/', [
				'uses' 	=> 'QuotesController@getIndex',
				'as'	=> 'index'
	]);

Route::post('/new', [
				'uses' 	=> 'QuotesController@postQuote',
				'as'	=> 'create'
	]);

Route::get('/delete/{quote}', [
				'uses' 	=> 'QuotesController@getDelete',
				'as'	=> 'delete'
	]);

Route::get('/{author?}', [
				'uses' 	=> 'QuotesController@getIndex',
				'as'	=> 'index'
	]);

Route::get('/gotemail/{author_name}', [
				'uses'	=>'QuotesController@getMailCallback',
				'as'	=>'mail_callback',
	]);

Route::get('/admin/login', [
				'uses'	=>'AdminController@getLogin',
				'as'	=>'admin.login'
	]);
Route::post('/admin/login', [
				'uses'	=>'AdminController@postLogin',
				'as'	=>'admin.login'
	]);

Route::group(['middleware'=>['auth']], function(){
	Route::get('/admin/dashboard', [
				'uses'	=>'AdminController@getDashboard',
				'as'	=>'admin.dashboard',

	]);
	Route::get('/admin/logout', [
				'uses'	=> 'AdminController@getLogout',
				'as'	=>'admin.logout',
				
	]);

});


