@extends('layouts.master')

@section('content')

<h1>Create a New List</h1>
<ul>
	@foreach($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</ul>
@if (session('status'))
<div class="alert alert-success">
	{{ session('status') }}
</div>
@endif
@if (isset($message))
<div class="alert alert-success">
	{{ $message }}
</div>
@endif
{!! Form::open(array('route'=>'lists.store', 'class'=>'form')) !!}

<div class="form-group">
	{!! Form::label('List Name') !!}
	{!! Form::text('name', null, 
	array('class'=>'form-control',
	'placeholder'=>'San Juan Vacation')) !!}
	
</div>

<div class="form-group">
	{!! Form::label('List Note') !!}
	{!! Form::text('note', null, 
	array('class'=>'form-control',
	'placeholder'=>'note')) !!}
	
</div>

<div class="form-group">
	{!! Form::label('List Description') !!}
	{!! Form::textarea('description', null, 
	array('class'=>'form-control',
	'placeholder'=>'Things to do before leaving to vacation')) !!}
	
</div>

<h3>Categories</h3>

<div class="form-group">
	{!! Form::label('Categories') !!}
	{!! Form::select('categories', $categories, null) !!}
</div>

<div class="form-group">
	{!! Form::submit('Create List', null, 
	array('class'=>'btn btn-primary')) !!}
	
</div>

{!! Form::close() !!}


@endsection