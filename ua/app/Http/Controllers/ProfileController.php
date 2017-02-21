<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\CheckRole;

class ProfileController extends Controller
{
	// public function __construct()
	// {
	// 	$this->middleware('auth');
	// }

        /**
     * Update the user's profile.
     *
     * @param  Request  $request
     * @return Response
     */
        public function update(Request $request)
        {
        	return $request->user();
        }
    }

