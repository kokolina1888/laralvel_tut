<?php 
namespace Sim\Presenters;

use Laracasts\Presenter\Presenter;
use Illuminate\Support\Facades\App;
use League\CommonMark\Converter;




class PostPresenter extends Presenter{
	protected $converter;

	

	public function bar()
	{
		if ($this->excerpt) {
			return $this->converter->convertToHtml($this->excerpt);
		}
	}
	
	public function publishedDate()
	{
		if($this->published_at){
			return $this->published_at->toFormattedDateString();
		}

		return 'Not Published';
	}

	public function publishedHighlight()
	{
		if($this->published_at && $this->published_at->isFuture()){
			return 'info';
		} elseif(! $this->published_at)
		{
			return 'warning';
		}
	}
	
} 