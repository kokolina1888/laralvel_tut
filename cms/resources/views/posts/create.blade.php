@extends('layouts.app')
@section('content')
<!-- <form method="post" action="/posts" >
{{csrf_field()}}

	<input type="text" name="title">
	<input type="submit" name="submit">
</form>
-->
<h1>Create Posts</h1>
@if(count($errors)>0)
<ul>
	@foreach($errors->all() as $error)
	<li>
		{{$error}}
	</li>
	@endforeach
</ul>
@endif
{!!Form::open(['method'=>'POST', 'action'=>'PostsController@store', 'files'=>true])!!}
{{csrf_field()}}
{!!Form::label('title', 'Title:')!!}
{!!Form::text('title', null, ['class'=>'form-controller'])!!}
{!!Form::file('file', ['class'=>'form-controller'])!!}
{!!Form::submit('Create Post', ['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
<p><a href="{{route('posts.index')}}">Home</a></p>
@endsection

