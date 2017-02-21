<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
   public function getHome(){

    $user = Auth::user();



   	return view('home_admin', compact('user'));
   }
}
