@extends('layouts.admin')

@section('content')
<h1>Create Category, {{ Auth::user()->name }}</h1>

<div class="container">
	<div class="row">
		<div class="col-sm-6">

			{!!Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store'])!!}

			<div class="form-group">
				{!!Form::label('name', 'Name')!!}
				{!!Form::text('name', null, ['class'=>'form-control'])!!}
			</div>

			<div class="form-group">
				{!!Form::submit('Create Category', ['class'=>'btn btn-primary'])!!}
			</div>
		</div>
	</div>
</div>
@endsection