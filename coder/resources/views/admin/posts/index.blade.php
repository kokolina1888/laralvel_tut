@extends('layouts.admin')
@section('page_title')
<h1>Posts, {{ Auth::user()->name }}</h1>
@stop
@section('content')
<table class="table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Category</th>
			<th>Photo</th>
			<th>Title</th>
			<th>Content</th>
			<th>Created</th>
			<th>Updated</th>
			<th></th>
		</tr>
		@if($posts)
		@foreach($posts as $post)

		<tr>
			<td>{{$post->user->name}}</td>
			<td>{{$post->category->name}}</td>
			<td>
				@if($post->photo)
				<img src="{{$post->photo->file}}" alt="" height="150">
				@else 
				<img src="http://placehold.it/150x150" alt="">
				@endif
			</td>
			<td>{{$post->title}}</td>
			<td>{{$post->body}}</td>
			<td>{{$post->created_at->diffForHumans()}}</td>
			<td>{{$post->updated_at->diffForHumans()}}</td>
			<td><a href="{{route('posts.edit', ['post_id'=>$post->id, 'auth_user'=>Auth::user()->name])}}">Edit Post</a></td>


			
		</tr>
		@endforeach
		@endif
	</thead>
	

</table>

@stop