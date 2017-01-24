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
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {

    $data = [
    'title' 	=> 'email title',
    'content'	=> 'email conent'

    ];

    $res = Mail::send('emails.test', $data, function($message){
    	$message->to('kokolina18@abv.bg', 'Me')->subject('The Subject');
    });
    return $res;
});
