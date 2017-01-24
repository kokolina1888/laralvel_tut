@extends('layouts.app')
@section('content')
<h1><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></h1>
	<div class="image-container">
			<img height="100" src="{{$post->path}}">
	</div>
<p><a href="{{route('posts.index')}}">Home</a></p>
<p><a href="{{route('posts.create')}}">Add new post</a></p>
@endsection

@yield('footer')