@extends('layouts.backend')
@section('title', 'Delete' . $post->title)
@section('content')
{!! Form::open(['method' => 'delete', 'route' => ['blog.destroy', $post->id]]) !!}
<div class="alert alert-danger">
	<strong>Warning!</strong> You are about to delete a post. This action cannot be undone!
</div>
{!! Form::submit('Yes, delete this post!', ['class' => 'btn btn-danger'])!!}
<a href="{{ route('blog.index') }}" class="btn btn-success"><strong>Noq get me out of here</strong></a>
{!! Form::close() !!}
@endsection