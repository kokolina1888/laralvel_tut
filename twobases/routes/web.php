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
use App\Test;
use App\User;

Route::get('/', function () {
$tests = Test::all();
$users = User::all();
    return view('welcome', compact(['tests', 'users']));
});