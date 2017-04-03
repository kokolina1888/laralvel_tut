<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\PostFormFields;
use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
     return view('admin.post.index', compact('posts'));
 }

 public function create()
 {
    $data = $this->dispatch(new PostFormFields(null));
   
    return view('admin.post.create')->with('data', $data);
}


public function store(PostCreateRequest $request)
{
    $post = Post::create($request->postFillData());
    $post->syncTags($request->get('tags', []));

    return redirect()->route('post.index')->withSuccess('New Post Successfully Created');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();

        return view('blog.post')->withPost($post);
    }
    
    public function edit($id)
    {
    
    $data = $this->dispatch(new PostFormFields($id));   
   
    return view('admin.post.edit')->with('data', $data);

    }

    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->fill($request->postFillData());
        $post->save();

        $post->syncTags($request->get('tags', []));

        if ($request->action === 'continue') {
             return \Redirect::back()->withSuccess('Post saved');
         } 

         return redirect(route('post.index'))->withSuccess('Post was saved');
            
         
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('post.index')->withSuccess('Post deleted');
    }



}
