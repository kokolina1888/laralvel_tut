<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;

class PostsController extends Controller
{
	public function index()
	{
		$posts = Post::all();

		return view('posts.index', compact('posts'));
	}
	public function create()
	{
		return view('posts.create');
	}

	public function store(Requests\CreatePostRequest $request)
	{
		
		$input = $request->all();
		$input['title'] = $request->title;
		if ($file = $request->file('file')) {
			$name = $file->getClientOriginalName();
			$file->move('images', $name);
			$input['path'] = $name;
		}
		Post::create($input);

		return $this->index();
		
	}

	public function show($id)
	{
		$post = Post::findOrFail($id);
		return view('posts.show', compact('post'));
	}
	
	public function edit($id){
		$post = Post::findOrFail($id);
		return view('posts.edit', compact('post'));
	}

	public function destroy($id)
	{
		$post = Post::findOrFail($id);
		$post->delete();

		return redirect('/posts');

	}


	public function update(Request $request, $id)
	{
		$post = Post::findOrFail($id);
		$input = $request->all();
		if ($file = $request->file('file')) {
			$name = $file->getClientOriginalName();
			$file->move('images', $name);
			$input['path'] = $name;
		}
		$post->update($input);

		return redirect('posts');
	}
}
