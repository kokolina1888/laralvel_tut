<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gate;

use User;
use Auth;
class IndexController extends AdminController
{
	public function __construct() {
		
		parent::__construct();
		$this->middleware(function ($request, $next) {
			$this->user= Auth::user();

			if(Gate::denies('view_admin')){
				abort(403);
			}
			return $next($request);
		});
	
		
		$this->template = env('THEME').'.admin.index';
		
	}
	
	public function index() {


		$this->title = 'Admin panel';

		// $result = $this->user->hasRole(['admin', 'guest'], true);
		// dd($result);
	return $this->renderOutput();
		
	}

	
}
