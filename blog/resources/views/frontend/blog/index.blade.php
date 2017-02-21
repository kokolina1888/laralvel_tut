@extends('layouts.master')

@section('title')
Blog Index 
@endsection

@section('styles')
@endsection

@section('content')
<div class="main">
@foreach($posts as $post)

	<article class="blog-post">
		<h3>
			{{ $post->title }}
		</h3>
		<span class="subtitle">{{ $post->author }} | {{ $post->created_at->diffForHumans() }}</span>
		<p> {{ $post->body }}<a href="{{ route('blog.single', ['post-id'=>$post->id, 'end'=>'frontend'])}}"> Read more ...</a></p>
	</article>
	@endforeach
	<section class="pagination">
	
	@if($posts->currentPage()!==1)
	<a href="{{ $posts->previousPageUrl()}}">
		<span class="fa fa-caret-left"></span>
	</a>
	@endif
	@if($posts->currentPage()!==$posts->lastPage() && $posts->hasPages())
	<a href="{{ $posts->nextPageUrl()}}">
		<span class="fa fa-caret-right"></span>
	</a>
	@endif

	
	</section>
</div>

@endsection