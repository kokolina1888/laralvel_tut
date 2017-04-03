<?php

namespace App\Http\Controllers;

use App\Jobs\BlogIndexData;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Http\Requests;
use App\Services\RssFeed;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$tag = $request->get('tag');
    	$data = $this->dispatch(new BlogIndexData($tag));
    	$layout = $tag ? Tag::layout($tag) : 'blog.layouts.index';

    	return view($layout, $data);
    }
    public function show($slug, Request $request)
    {
    	$post = Post::with('tags')->whereSlug($slug)->firstOrFail();
    	$tag = $request->get('tag');

    	if($tag){
    		$tag = Tag::whereTag($tag)->firstOrFail();
    	}

    	return view($post->layout, compact('post', 'tag', 'slug'));
    }
    public function rss(RssFeed $feed)
    {
    	$rss = $feed->getRSS();

    	return response($rss)->header('Content-type', 'application/rss+xml');
    }
}
