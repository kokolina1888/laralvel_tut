@extends('layouts.app')
@section('content')
<!-- <form method="post" action="/posts/{{$post->id}}" >
	{{csrf_field()}}
	<input type="text" name="title" value="{{$post->title}}">
	<input type="hidden" name="_method" value="PUT">	
	<input type="submit" name="Update">
</form>
<form method="post" action="/posts/{{$post->id}}">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="DELETE">
	<input type="submit" name="submit" value="Delete">	
</form> -->
<h1>Edit Post</h1>
{!!Form::open(['method'=>'PATCH', 'action'=>['PostsController@update', $post->id], 'files'=>true])!!}
{{csrf_field()}}
{!!Form::label('title', 'Title:')!!}
{!!Form::text('title', $post->title, ['class'=>'form-controller'])!!}
{!!Form::file('file', ['class'=>'form-controller'])!!}
{!!Form::submit('Update Post', ['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
<!-- DELETE -->
{!!Form::open(['method'=>'DELETE', 'action'=>['PostsController@destroy', $post->id]])!!}
{!!Form::submit('Delete Post', ['class'=>'btn btn-danger'])!!}
{!!Form::close()!!}

<p><a href="{{route('posts.index')}}">Home</a></p>
<p><a href="{{route('posts.create')}}">Add new post</a></p>
@endsection