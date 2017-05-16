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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index');

Route::resource('/', 'IndexController', ['only'=>['index']]);
Route::resource('portfolios', 'PortfoliosController', ['parameters'=>['portfolios'=>'alias']]);

Route::resource('articles','ArticlesController',['parametres'=>['articles' => 'alias']]);	
Route::get('articles/cat/{cat_alias?}', ['uses'=>'ArticlesController@index', 'as'=>'articlesCat']);
Route::get('/articles/{alias}', ['uses' => 'ArticlesController@show', 'as'=>'ArtcleShow']);
Route::resource('comment', 'CommentController', ['only'=>'store']);

Route::match(['get', 'post'], '/contacts', ['uses'=>'ContactsController@index', 'as'=>'contacts']);

Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
Route::group(['prefix' => 'admin','middleware'=> ['auth']],function() {
	
	//admin
	Route::get('/', 'Admin\IndexController@index');
	Route::resource('/articles','Admin\ArticlesController');
	
});
