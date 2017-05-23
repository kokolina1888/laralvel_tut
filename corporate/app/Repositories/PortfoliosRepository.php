<?php 

namespace Corp\Repositories;

use Corp\Portfolio;

use Gate;
use Image;
use Config;
use Auth;

class PortfoliosRepository extends Repository {

	public function __construct(Portfolio $portfolio)
	{
		$this->model = $portfolio;
	}

	public function one($alias, $attr = []) {
		$portfolio = parent::one($alias, $attr = []);
		
		if($portfolio && $portfolio->img){
			$portfolio->img = json_decode($portfolio->img);
		}

		return $portfolio;
	}

	public function addPortfolio($request) {

		if(Gate::denies('save', $this->model)) {
			abort(404);
		}
		// dd($request);
		$data = $request->except('_token','image');
		
		if(empty($data)) {
			return array('error' => 'No data');
		}
		
		if(empty($data['alias'])) {
			$data['alias'] = $this->transliterate($data['title']);
		}
		
		if($this->one($data['alias'], FALSE)){
			$request->merge(['alias'=>$data['alias']]);

			$request->flash();

			return ['error'=>'The alias is in use'];
		}

		if($request->hasFile('image')){
			$image = $request->file('image');

			if($image->isValid()){
				$str = str_random(8);
				$obj = new \stdClass;

				$obj->mini = $str.'_mini.jpg';
				$obj->max = $str.'_max.jpg';
				$obj->path = $str.'.jpg';

				$img = Image::make($image);

				$img->fit(Config::get('settings.image')['width'], 
					Config::get('settings.image')['height'])->save(public_path().'/'.env('THEME').'/images/projects/'.$obj->path);

				$img->fit(Config::get('settings.portfolios_img')['max']['width'], 
					Config::get('settings.portfolios_img')['max']['height'])->save(public_path().'/'.env('THEME').'/images/projects/'.$obj->max);
				$img->fit(Config::get('settings.portfolios_img')['mini']['width'], 
					Config::get('settings.portfolios_img')['mini']['height'])->save(public_path().'/'.env('THEME').'/images/projects/'.$obj->mini);
				$data['img'] = json_encode($obj);
				$data['uaer_id'] = Auth::user()->id;
//dd($data);
				$this->model->fill($data);

				if($request->user()->portfolios()->save($this->model)){
					return ['status' => 'portfolio has been saved']; 
				}

			}
		}

	}

}