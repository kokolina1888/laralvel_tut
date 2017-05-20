<?php 

namespace Corp\Repositories;

use Corp\Menu;

use Gate;

class MenusRepository extends Repository {

	public function __construct(Menu $menu)
	{
		$this->model = $menu;
	}

	public function addMenu($request) {
		// dd($request);
		if(Gate::denies('save', $this->model)) {
			abort(403);
		}
		// dd($request);
		$data = $request->except( "_token");
		// dd($data);
		if(empty($data)) {
			return ['error'=>'Нет данных'];
		}
		
		
		
		switch($data['type']) {
			
			case 'customLink':
			$data['path'] = $request->input('custom_link');
			break;
			
			case 'blogLink' :
			
			if($request->input('category_alias')) {
				if($request->input('category_alias') == 'parent') {
					$data['path'] = route('articles.index');
				}
				else {
					$data['path'] = route('articlesCat',['cat_alias'=>$request->input('category_alias')]);
				}
			}
			
			else if($request->input('article_alias')) {
				$data['path'] = route('articles.show',['alias' => $request->input('article_alias')]);
			}
			
			break;
			
			case 'portfolioLink' :
			if($request->input('filter_alias')) {
				if($request->input('filter_alias') == 'parent') {
					$data['path'] = route('portfolios.index');
				}
			}
			
			else if($request->input('portfolio_alias')) {
				$data['path'] = route('portfolios.show',['alias' => $request->input('portfolio_alias')]);
			}
			break;
			default: 
			$data['type'] = 'customLink';
			$data['path'] = $request->input('custom_link');
			break;
			
		}
		

		unset($data['type']);
		$data['user_id'] = \Auth::user()->id;
		//dd($data);
		if($this->model->fill($data)->save()) {
			return ['status'=>'Link has been added'];
		}
		
		
		
	}

	public function updateMenu($request, $menu) {
		if(Gate::denies('edit', $this->model)) {
			abort(403);
		}
		
		$data = $request->only('type','title','parent');
		
		if(empty($data)) {
			return ['error'=>'No data'];
		}
		
		//dd($request->all());
		// dd($data['type']);
		switch($data['type']) {
			
			case 'customLink':
			$data['path'] = $request->input('custom_link');
			break;
			
			case 'blogLink' :
			
			if($request->input('category_alias')) {
				if($request->input('category_alias') == 'parent') {
					$data['path'] = route('articles.index');
				}
				else {
					$data['path'] = route('articlesCat',['cat_alias'=>$request->input('category_alias')]);
				}
			}
			
			else if($request->input('article_alias')) {
				$data['path'] = route('articles.show',['alias' => $request->input('article_alias')]);
			}
			
			break;
			
			case 'portfolioLink' :
			
			if($request->input('filter_alias')) {
				if($request->input('filter_alias') == 'parent') {
					$data['path'] = route('portfolios.index');
				}
			}
			
			if($request->input('portfolio_alias')) {
				
				$data['path'] = route('portfolios.show', ['alias' => $request->input('portfolio_alias')]);
			} 
// dd($request->input());
				// $data['path'] = route('portfolios.index');

			break;
			
		}
		
// dd($request->input('portfolio_alias'));
		unset($data['type']);

		$data['user_id'] = \Auth::user()->id;
		
		if($menu->fill($data)->update()) {
			return ['status'=>'Link has been updated'];
		}
		
		
		
	}

	public function deleteMenu($menu) {
		// dd(\Auth::user()->id == $menu->user_id);
		if(Gate::denies('edit', $this->model)) {
			abort(403);
		}
		
		if($menu->delete()) {
			return ['status'=>'Link has been deleted'];
		}
	}

}