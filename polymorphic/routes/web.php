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
use App\Staff;
use App\Photo;
use App\Product;
use App\User;

Route::get('/create', function(){
	$staff = Staff::find(1);
	//echo $staff->name;
	$staff->photos()->create(['path'=>'example.jpg']);
});

Route::get('/read', function(){
	$staff = Staff::findOrFail(1);
	foreach ($staff->photos as $photo) {
		return $photo->path;
	}
});

Route::get('/update', function(){
	$staff = Staff::findOrFail(1);
	$res = $photo = $staff->photos()->whereId(3)->first();
	$photo->path = 'Update_example.jpg';
	$photo->save();
	echo $res;
});

Route::get('/delete', function(){
	$staff = Staff::findOrFail(1);
	$staff->photos()->delete();
});

Route::get('/assign', function(){
	$staff = Staff::findOrFail(1);
	$photo = Photo::findOrFail(1);
	$staff ->photos() -> save($photo);
});

Route::get('/unassign', function(){
$staff = Staff::findOrFail(1);
$photo = Photo::findOrFail(2);

$staff->photos()->whereId(1)->update(['imageable_id'=>NULL, 'imageable_type'=>NULL]);
});