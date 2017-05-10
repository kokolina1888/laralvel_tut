<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gate;

class IndexController extends AdminController
{
	public function __construct() {
		
		parent::__construct();

		if(Gate::allows('view_admin')){
			abort(404);
		}
		
		$this->template = env('THEME').'.admin.index';
		
	}
	
	public function index() {


		$this->title = 'Admin panel';

		
		return $this->renderOutput();
		
	}

	
}
