@extends('layouts.app')
@section('content')
<ul>
	@foreach($posts as $post)	
	
	<li>
		<div class="image-container">
			<img height="100" src="{{$post->path}}">
		</div>
		<a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a>
		
	</li>

	@endforeach

</ul>
	<p><a href="{{route('posts.create')}}">Add new post</a></p>

@endsection