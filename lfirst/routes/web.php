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
/**
* RAW SQL QUERIES
*/

// Route::get('/insert', function (){
// 	DB::insert('INSERT INTO posts (title, content, is_admin) VALUES (?, ?, ?)', ['PHP with Laravel 2', 'very large content', 0]);
// });

// Route::get('/read', function(){
// 	$posts = DB::select('select * from posts where id=?', [1]);

// 	foreach ($posts as $post) {
// 		return $post->title;
// 	}
// 	});

// Route::get('/update', function(){
// 	$updated = DB::update('UPDATE posts set title = "Updated title" where id = ?', [1]);
// });

// Route::get('/delete', function(){
// 	$deleted = DB::delete('delete from posts where id = ?', [1]);
// 	return $deleted;
// });

/**
* ELOQUENT ORM
*/

use App\Post;
use App\User;
use App\Country;
use App\Photo;
use App\Tag;
use App\Video;
use App\Taggable;

// Route::get('/read', function(){

// 	$posts = Post::all();

// 	foreach ($posts as $post) {
// 		echo $post->title;
// 	}

// });

// Route::get('/findwhere', function(){
// 	$posts = Post::where('id', 2)->orderBy('id', 'desc')->take(1)->get();

// 	return $posts;
// });

// Route::get('/findmore', function(){
// 	$posts = Post::findOrFail(2);

// });

// Route::get('/basicinsert', function(){
// 	$post = new Post;
// 	$post->title = 'new ORM title';
// 	$post->content = 'new ORM content';
// 	$post->is_admin = 0;


// 	$post->save();

// });

// Route::get('/basicupdate', function(){

// 	$post = Post::find(2);
// 	$post->title = 'updated ORM title';
// 	$post->content = 'updated ORM content';
// 	$post->is_admin = 0;

// 	$post->save();


// });

// Route::get('/create', function(){
// 	Post::create([	'title'		=>'PHP 2',
// 					'content'	=>'now I am learning Laravel',
// 					'is_admin'	=> 0]);
// });

// Route::get('/update', function(){

// 	Post::where('id', 2)->where('is_admin', 0)->update(['title'		=>'new updated title', 
// 														'content'	=>'new updated content']);
// });

// Route::get('/delete', function(){
// 	$post = Post::find(4);
// 	$post -> delete();
// });

// Route::get('/delete2', function(){
// 	Post::destroy([2,5]);
// });

// Route::get('/softdelete', function(){

// 	Post::find(1)->delete();

// });

// // Route::get('/Readsoftdelete', function(){
// // 	//$post = Post::find(2);
// // 	//$post = Post::withTrashed()->where('id', 1)->get();
// // 	$post = Post::onlyTrashed()->get();

// // 	return $post;
	
// // });

// Route::get('/readsoftdelete', function(){
// 	//$post = Post::find(1);
// 	//$post = Post::withTrashed()->get();
// 	$post = Post::onlyTrashed()->get();
// 	return $post;
// });

// Route::get('/restore', function(){
// 	$res = Post::withTrashed()->where('is_admin', 0)->restore();
// 	return $res;
// });

// Route::get('/forcedelete', function(){
// 	$res = Post::withTrashed()->where('is_admin', 0)->forceDelete();
// 	return $res;
// });
// Route::get('/user/{id}/post', function($id){
// 	return User::find($id)->post->content;
// });

// Route::get('/post/{id}/user', function($id){
// 	return Post::find($id)->user->name;
	
// });

// Route::get('/posts', function(){
// 	$user = User::find(1);

// 	foreach($user->posts as $post){
// 		echo $post->title;
// 	}
// });

// Route::get('/user/{id}/role', function($id){
// 	$user = User::find($id);

// 	foreach ($user->roles as $role) {
// 		echo $user->name . ' - ';
// 		echo $role->name . ' / ';
// 	}
// });

// Route::get('/user/pivot', function(){
// 	$user = User::find(1);

// 	foreach ($user->roles as $role) {
// 		if($role->pivot->created_at)
// 		{
// 			echo 'yes';
// 		} else {
// 			echo "no";
// 		}
// 	}
// });

// Route::get('/user/country', function(){
// 	$country = Country::find(1);

// 	foreach ($country->posts as $post) {
// 		echo $post->title . ' - ' . $country->name . ' / ';
// 	}
// });

// Route::get('/user/photos', function(){
// 	$user = User::find(1);
// 	foreach ($user->photos as $photo) {
// 		return $photo->path;
// 	}
//});
// Route::get('/post/photos', function(){
// 	$post = Post::find(2);
// 	foreach ($post->photos as $photo) {
// 		echo $photo->path;

// 	}
// });
// Route::get('/photo/post', function(){
// 	$photo = Photo::findOrFail(2);
// 	echo $photo->path;
	
// });

// Route::get('/post/tag', function(){
// 	$post = Post::find(1);
// 	foreach ($post->tags as $tag) {
// 		echo $tag->name;
// 	}
// });

Route::get('/tag/post', function(){
	$tag = Tag::find(1);
	foreach ($tag->posts as $post) {
		echo $post->title;
	}
});
