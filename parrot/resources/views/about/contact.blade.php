@extends('layouts.master')

@section('content')

<h1>Contact TODOParrot</h1>
<ul>
	@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
</ul>

{!! Form::open(array('route'=>'contact_store', 'class'=>'form')) !!}

<div class="form-group">
{!! Form::label('Your name') !!}
{!! Form::text('name', null, 
			array('class'=>'form-control',
				'placeholder'=>'Your name')) !!}
	
</div>

<div class="form-group">
{!! Form::label('Your E-mail') !!}
{!! Form::text('email', null, 
			array('class'=>'form-control',
				'placeholder'=>'Your email')) !!}
	
</div>

<div class="form-group">
{!! Form::label('Your message') !!}
{!! Form::textarea('message', null, 
			array('class'=>'form-control',
				'placeholder'=>'Your message')) !!}
	
</div>

<div class="form-group">
{!! Form::submit('Contact Us!', null, 
			array('class'=>'btn btn-primary')) !!}
	
</div>

{!! Form::close() !!}


@endsection