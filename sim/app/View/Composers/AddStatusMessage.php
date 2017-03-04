<?php 

namespace Sim\View\Composers;

use Illuminate\View\View;


class AddStatusMessage {


	public function compose(View $view)
	{
		$view->with('status', session('status'));
	}
}