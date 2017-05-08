<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;


class IndexController extends AdminController
{
	 public function __construct() {
		
		parent::__construct();
		
		$this->template = env('THEME').'.admin.index';
		
	}
	
	public function index() {


		$this->title = 'Admin panel';

		
		return $this->renderOutput();
		
	}

	
}
