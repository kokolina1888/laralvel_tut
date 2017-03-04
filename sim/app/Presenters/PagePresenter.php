<?php 
namespace Sim\Presenters;

use Laracasts\Presenter\Presenter;

class PagePresenter extends Presenter{

	public function wildCard()
	{
		return $this->uri.'*';
	}

	public function prettyUrl()
	{
		return '/'.ltrim($this->url, '/');
	}

	public function linkToPaddedTitle($link)
	{
		$padding = str_repeat('&nbsp;', $this->depth * 4);

		return $padding.link_to($link, $this->title);
	}
	public function paddedTitle()
	{
		
		return str_repeat('&nbsp;', $this->depth * 4).$this->title;

	}
} 