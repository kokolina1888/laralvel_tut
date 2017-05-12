<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Repositories\ArticlesRepository;

use Auth;
use Gate;


class ArticlesController extends AdminController
{


	public function __construct(ArticlesRepository $a_rep) {
		
		parent::__construct();
		
		$this->middleware(function ($request, $next) {
			$this->user= Auth::user();

			if(Gate::denies('view_admin_articles')){
				abort(404);
			}

			return $next($request);
		});
		
		$this->a_rep = $a_rep;
		
		$this->template = env('THEME').'.admin.articles';
	}


	public function index()
	{

		$this->title = 'Admin articles';

		$articles = $this->getArticles();

		dd($articles);

		return $this->renderOutput();


	}

	public function getArticles()
	{
		return $this->a_rep->get();
	}
}
