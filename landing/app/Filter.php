<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
	public function portfolios() 
	{
		return $this->hasMany('App\Portfolio');
	}

	public static function allTags()
	{
		
		return Filter::all()->pluck('name', 'id')->toArray();

	}
}
