@extends('layouts.backend')
@section('title', 'Delete' . $user->name)
@section('content')
{!! Form::open(['method' => 'delete', 'route' => ['users.destroy', $user->id]]) !!}
<div class="alert alert-danger">
	<strong>Warning!</strong> You are about to delete a user. This action cannot be undone!
</div>
{!! Form::submit('Yes, delete this user!', ['class' => 'btn btn-danger'])!!}
<a href="{{ route('users.index') }}" class="btn btn-success"><strong>Noq get me out of here</strong></a>
{!! Form::close() !!}
@endsection