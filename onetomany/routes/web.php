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
use App\User;
use App\Post;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/create', function(){
	$user 		= User::findOrFail(1);
	$data 		= ['title'=> '1234 Houston', 'body'=>'large content']; 
	$post 	= new Post($data); 
	$user->posts()->save($post);
});

Route::get('/read', function(){
	$user = User::findOrFail(1);
	

	foreach ($user->posts as $post) {
		echo $post->title;
	}
});

Route::get('/update', function(){
$user = User::find(1);
$user->posts()->whereId(1)->update(['title'=>'updated', 'body'=>'updated content']);
});

Route::get('/delete', function(){
	$user = User::find(1);
	$user->posts()->whereId(1)->delete();
});
