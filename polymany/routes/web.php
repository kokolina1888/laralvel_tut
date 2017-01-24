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
use App\Post;
use App\Tag;
use App\Taggable;
use App\User;
use App\Video;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function(){
	
	
	$post = Post::create(['name'=>'My first Post']);
	$tag1 = Tag::find(1);
	var_dump($tag1->name);
	$video = Video::create(['name'=>'video.mov']);
	$tag2 = Tag::find(2);

	$post->tags()->save($tag1);
	$video->tags()->save($tag2);

});

Route::get('/read', function(){
	$post = Post::findOrFail(3);
	foreach ($post->tags as $tag) {
		echo $tag;
	}
});

Route::get('/update', function(){
	$post = Post::findOrFail(4);

	foreach ($post->tags as $tag) {
		return $tag->whereName('sport')->update(['name'=>'updated']);
	}
});

Route::get('/delete', function(){
	$post = Post::find(4);
	var_dump($post->tags);
	foreach($post->tags as $tag){
		var_dump($tag->tag_id);
		//$tag->whereId(1)->delete();
	}
});