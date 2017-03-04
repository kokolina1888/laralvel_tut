<?php

namespace Sim;

use Baum\Node;
use Laracasts\Presenter\PresentableTrait;



class Page extends Node
{
	use PresentableTrait;

	protected $presenter = 'Sim\Presenters\PagePresenter';

	protected $fillable = ['title', 'name', 'url', 'content', 'template', 'hidden'];
	public function updateOrder($order, $orderPage)
	{
		$orderPage = $this->findOrFail($orderPage);
		
		if($order == 'before'){
			//dd($order == 'before');
			$this->moveToLeftOf($orderPage);
		} elseif($order == "after"){
			//dd($order == 'after');
			$this->moveToRightOf($orderPage);
		} elseif($order == 'childOf'){
			//dd($order == 'childOf');
			$this->makeChildOf($orderPage);
		}
	}
	public function setNameAttribute($value)
	{
		$this->attributes['name'] = $value?: null;
	}
	public function setTemplateAttribute($value)
	{
		$this->attributes['template'] = $value?: null;
	}
}

