@extends('layouts.master')

@section('title')
Post Title
@endsection

@section('styles')
@endsection

@section('content')
<article>
	<h3>
		{{ $post->title }}
	</h3>
	<span class="subtitle">{{ $post->author }}| {{ $post->created_at->diffForHumans() }}</span>
	<p>{{ $post->body }}</p>
</article>
<a href="{{ route('blog.index') }}">Blog Index</a>
@endsection