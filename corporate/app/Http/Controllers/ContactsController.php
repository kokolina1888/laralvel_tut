<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactsController extends SiteController
{
	public function __construct() {

		parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

		$this->bar = 'left';

		$this->template = env('THEME').'.contacts';

	}

	public function index(Request $request)
	{

		if ($request->isMethod('post')) {

			$messages = [
			'required' => 'Поле :attribute Обязательно к заполнению',
			'email'    => 'Поле :attribute должно содержать правильный email адрес',
			];
			
			$this->validate($request, [
				'name' => 'required|max:255',
				'email' => 'required|email',
				'text' => 'required'
				]/*,$messages*/);
			
			$mail_admin = 'kokolina18@abv.bg';


			$data = $request->all();
			
			Mail::send(env('THEME').'.email', ['data' => $data], function ($m) use ($data) {

				$m->from($data['email'], $data['name']);

				$m->to('kokolina18@abv.bg', 'Mr. Admin')->subject('Question');
			});


dd(count(Mail::failures()));
			if (count(Mail::failures()) == 0) {
				
			
				return back()->withStatus('Thank you for your message. It has been send.');

				// return redirect()->route('contacts')->with('status', 'Email is send');
			}
			
			
		}


		$this->title = 'Contacts';

		$content = view(env('THEME').'.contact_content')->render();
		$this->vars = array_add($this->vars,'content',$content);

		$this->contentLeftbar = view(env('THEME').'.contact_bar')->render();

		return $this->renderOutput();

	}
}
