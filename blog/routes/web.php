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
Route::get('test', function()
{
	dd(Config::get('mail'));
});
Route::get('/', [
	'uses' 	=> 'PostController@getBlogIndex',
	'as'	=> 'blog.index'
	]);
Route::get('/blog', [
	'uses' 	=> 'PostController@getBlogIndex',
	'as'	=> 'blog.index'
	]);
Route::get('/blog/{post-id}', [
	'uses' 	=> 'PostController@getSinglePost',
	'as'	=> 'blog.single'
	]);

Route::get('/about', function(){
	return view('frontend.other.about');
})->name('about');

Route::get('/contact', [
	'uses' 	=> 'ContactMessageController@getContactIndex',
	'as'	=> 'contact'
	]);
// Route::get('/admin/login', [
// 	'uses'	=> 'AdminController@getLogin',
// 	'as'	=> 'admin.login'
// 	]);
// Route::post('/admin/login', [
// 	'uses'	=> 'AdminController@postLogin',
// 	'as'	=> 'admin.login'
// 	]);
Route::get('/login', [
	'uses'	=> 'AdminController@getLogin',
	'as'	=> 'admin.login']);
Route::post('/login', [
	'uses'	=> 'AdminController@postLogin',
	'as'	=> 'admin.login']);
Route::group([
	'prefix'=>'/admin',
	'middleware' => 'auth'
	], function(){
		Route::get('/', [
			'uses'	=>'AdminController@getIndex',
			'as'	=>'admin.index'
			]);
		Route::get('blog/posts/create', [
			'uses'	=> 'PostController@getCreatePost',
			'as'	=> 'admin.blog.create_post'
			]);
		Route::post('blog/post/create', [
			'uses'	=> 'PostController@postCreatePost',
			'as'	=> 'admin.blog.post_create'
			]);
		Route::get('/blog/post/{post_id}&{end}', [
			'uses'	=> 'PostController@getSinglePost',
			'as'	=> 'blog.single'
			]);
		Route::get('/blog/post/{post_id}/edit', [
			'uses'	=> 'PostController@getUpdatePost',
			'as'	=> 'admin.blog.post_edit'
			]);
		Route::post('blog/post/update', [
			'uses'	=> 'PostController@postUpdatePost',
			'as'	=> 'admin.blog.post_update'
			]);
		Route::get('/blog/post/{post_id}/delete', [
			'uses'	=> 'PostController@getDeletePost',
			'as'	=> 'admin.blog.post_delete'
			]);
		Route::get('/blog/categories', [
			'uses'	=> 'CategoryController@getCategoryIndex',
			'as'	=> 'admin.blog.categories'
			]);
		Route::post('/blog/category/create', [
			'uses'	=> 'CategoryController@postCreateCategory',
			'as'	=> 'admin.category.create'
			]);
		Route::post('/blog/categories/update', [
			'uses'	=> 'CategoryController@postUpdateCategory',
			'as'	=> 'admin.blog.category.update'
			]);
		Route::get('/blog/category/{category_id}/delete', [
			'uses'	=> 'CategoryController@getDeleteCategory',
			'as'	=> 'admin.blog.category.delete'
			]);
		Route::get('/contact/messages', [
			'uses'	=> 'ContactMessageController@getContactMessageIndex',
			'as'	=> 'admin.contact.index'
			]);
		Route::get('/contact/message/{message_id}/delete', [
			'uses'	=> 'ContactMessageController@getDeleteMessage',
			'as'	=> 'admin.contact.delete'
			]);
		Route::get('/logout', [
			'uses'	=> 'AdminController@getLogout',
			'as'	=> 'admin.logout'
			]);	

	});
Route::post('/contact/sendmail', [
	'uses'	=> 'ContactMessageController@postSendMessage',
	'as'	=> 'contact.send'
	]);

