@extends('layouts.master')

@section('content')

<h1>Update List</h1>
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
{!! Form::model($list, array('method'=>'put', 'route'=>['lists.update', $list->id], 'class'=>'form')) !!}

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


<div class="form-group">
				{!!Form::submit('Update List', ['class'=>'btn btn-primary'])!!}
			</div>
		</div>

{!! Form::close() !!}

{!! Form::open(array('method'=>'delete', 'route'=>['lists.destroy', $list->id], 'class'=>'form')) !!}

<div class="form-group">
<button class="btn btn-danger">Delete List</button>
	
</div>

{!! Form::close() !!}

@endsection