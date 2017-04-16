<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PagesEditRequest;

use App\Page;

class PagesEditController extends Controller
{
	public function execute(Page $page){
		$old = $page->toArray();
		if(view()->exists('admin.pages_edit')){
			$data = ['title'=>'Edit page '.$old['name'],
			'data' => $old,
			];

			return view('admin.pages_edit', $data);
		}
	}

	public function update(PagesEditRequest $request, $page){
		$page = Page::findOrFail($page);

		$input = $request->except('_token', 'images');
		if($request->hasFile('images')){
			$file = $request->file('images');
			$input['images'] = $file->getClientOriginalName();
			$file->move(public_path().'/assets/user_img', $input['images']);
		} else {
			$input['images'] = $input['old_images'];
		}

		unset($input['old_images']);

		$page->fill($input);

		if($page->update()){
			return redirect('/admin/pages')->with('status', 'The page has been updated!');
		}
	}

	public function destroy($page){
		$page = Page::findOrFail($page);
		$page->delete();

		return redirect('/admin/pages')->with('status', 'The page has been deleted');


	}
}
