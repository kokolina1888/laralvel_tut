@extends('app')
@section('content')

<h2>Contact WeDewLawns</h2>

@if (count($errors) > 0)
<div class="alert alert-danger">
	<p>Please correct the following errors</p>
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error}}</li>
		@endforeach
	</ul>
</div>
@endif
{{Session::get('message')}}
{!! Form::open(array('route'=>'contact_store', 'class' => 'form', 'novalidate' => 'novalidate'))!!}
	<div class="form-group">
		{!! Form::label('Your Name') !!}
		{!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Your name']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('Your e-mail') !!}
		{!! Form::text('email', null, ['class' => 'form-control', 'placeholder'=>'Your E-mail']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('Your message') !!}
		{!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder'=>'Your message']) !!}
	</div>
		
	{!! Form::submit('Contact Us', ['class' => 'btn btn-primary'])!!}

	
{!! Form::close()!!}
@endsection