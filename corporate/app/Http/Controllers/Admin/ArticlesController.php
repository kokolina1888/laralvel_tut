<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Repositories\ArticlesRepository;

use Corp\Http\Requests\ArticleRequest;

use Auth;
use Gate;

use Corp\Category;
use Corp\Article;


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

		$this->content = view(env('THEME').'.admin.articles_content')->with('articles', $articles);

		return $this->renderOutput();


	}

	public function getArticles()
	{
		return $this->a_rep->get();
	}

	public function create()
	{
		
		if(Gate::denies('save', new Article)){
			abort(404);
		}

		$this->title = 'Add Article';

		$categories = Category::select(['title','alias','parent_id','id'])->get();
		
		$lists = [];
		foreach($categories as $category){

			if($category->parent_id == 0){
				$lists[$category->title] = [];
			} else {
				$lists[$categories->where('id', $category->parent_id)->first()->title][$category->id] = $category->title;
			}
		}

		// $lists = [['one', 'two'], ['two', 'three']];
		
		$this->content = view(env('THEME').'.admin.articles_create_content')->with('categories', $lists);

		return $this->renderOutput();
	}


	public function store(ArticleRequest $request)
	{
		$result = $this->a_rep->addArticle($request);

		if(is_array($result) && !empty($result['error'])) {
			return back()->with($result);
		}
		
		return redirect('/admin')->with($result);
	}
}
