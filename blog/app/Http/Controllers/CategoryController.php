<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
	public function getCategoryIndex()
	{
		$categories = Category::orderBy('created_at', 'desc')->paginate(5);
		return view('admin.blog.categories', ['categories'=>$categories]);
	}

	public function postCreateCategory(Request $request){


		$this->validate($request, [
			'name'=> 'required|unique:categories'
			]);
		$category = new Category();
		$category->name = $request['name'];


		if ($category->save()){
			return response()->json([
				'message' => 'category created'
				], 200);
		
		}

 return response()->json([
				'message' => 'error during creation'
				], 404);

	}

	public function postUpdateCategory(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|unique:categories'
		]);

		$category = Category::find($request['category_id']);
		if(!$category){
			return response()->json([
				'message' => 'category not found'
				], 404);
		}

		$category->name = $request['name'];
		$category->update();
		return response()->json([
				'message' => 'category updated', 'name'=>$category->name
				], 200);
	}

	public function getDeleteCategory($category_id)
	{
		$category = Category::find($category_id);
		$category->delete();
		return response()->json([
				'message' => 'category deleted'], 200);

	}

}
