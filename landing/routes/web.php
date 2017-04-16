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
Route::get('/', 'PagesController@index')->name('home');
Route::get('service', 'ServicesController@index')->name('service');
Route::get('portfolio', 'PortfoliosController@index')->name('Portfolio');
Route::get('team', 'PeoplesController@index')->name('team');
Route::get('contact', 'ContactsController@index')->name('contact');
Route::post('contact', 'ContactsController@sendMail');


Route::resource('pages', 'PagesController', ['only'=>'show']);
Route::resource('service', 'ServicesController', ['only'=>'show']);
Route::resource('portfolio', 'PortfoliosController', ['only'=>'show']);
Route::resource('team', 'PeoplesController', ['only'=>'show']);


// ADMIN AREA ROUTES

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
	Route::get('/', 'PagesController@adminIndex')->name('admin');
	Route::get('/services', 'ServicesController@adminIndex')->name('admin_services');
	Route::get('/portfolios', 'PortfoliosController@adminIndex');
	Route::get('/team', 'PeoplesController@adminIndex')->name('admin_team');

	Route::resource('pages', 'PagesController', ['except'=>['index', 'show']]);
	Route::resource('service', 'ServicesController', ['except'=>['index', 'show']]);
	Route::resource('portfolio', 'PortfoliosController', ['except'=>['index', 'show']]);
	Route::resource('team', 'PeoplesController', ['except'=>['index', 'show']]);


});
//Route::match(['get', 'post'], '/', ['uses'=>'IndexController@execute', 'as'=>'home']);

//CONTACT PAGE
// Route::post('/', ['uses'=>'IndexController@sendMail', 'as'=>'send_mail']);

//VIEW SINGLE PAGE

// Route::get('/page/{alias}', ['uses'=>'PageController@execute', 'as'=>'page']);
// Route::get('/portfolios/{alias}', ['uses'=>'PortfoliosController@show', 'as'=>'portfolio']);



// /ADMIN PART ROUTES

// Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
	// Route::get('/', function(){
		// if(view()->exists('admin.index')){
			// $data['title'] = 'admin panel';
			// return view('admin.index', $data);		}

		// });

// PAGES
	// Route::group(['prefix'=>'pages'], function(){
	// 	Route::get('/', ['uses'=>'PagesController@execute', 'as'=>'pages']);
	// 	Route::match(['get'], '/add', ['uses'=>'PagesAddController@execute', 'as'=>'pagesAdd']);
	// 	Route::match(['post'], '/add', ['uses'=>'PagesAddController@create', 'as'=>'pagesCreate']);
	// 	Route::match(['get'], '/edit/{page}', ['uses'=>'PagesEditController@execute', 'as'=>'pagesEdit']);
	// 	Route::match(['post'], '/edit/{page}', ['uses'=>'PagesEditController@update', 'as'=>'pagesEdit']);
	// 	Route::match(['delete'], '/edit/{page}', ['uses'=>'PagesEditController@destroy', 'as'=>'pagesEdit']);
	// });
	// PORTFOLIOS/

		// Route::resource('portfolios', 'PortfoliosController', ['except' => ['show']]);
		// Route::get('/', ['uses'=>'PortfoliosController@execute', 'as'=>'portfolios']);
		// Route::match(['get', 'post'], '/add', ['uses'=>'PortfoliosAddController@execute', 'as'=>'portfoliosAdd']);
		// Route::match(['get', 'post', 'delete'], '/edit/{portfolio}', ['uses'=>'PortfoliosEditController@execute', 'as'=>'portfoliosEdit']);

// });



// SERVICES/
// Route::group(['prefix'=>'services'], function(){
// 	Route::get('/', ['uses'=>'ServicesController@execute', 'as'=>'services']);
// 	Route::match(['get', 'post'], '/add', ['uses'=>'ServicesAddController@execute', 'as'=>'servicesAdd']);
// 	Route::match(['get', 'post', 'delete'], '/edit/{service}', ['uses'=>'ServicesEditController@execute', 'as'=>'servicesEdit']);
// });
Auth::routes();

