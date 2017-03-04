<?php 

namespace Sim\View\Composers;

use Illuminate\View\View;


class AddAdminUsers {


	public function compose(View $view)
	{
		$view->with('admin', auth()->user());
	}
}