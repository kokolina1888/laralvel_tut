@extends('layouts.admin')

@section('content')
<h1>Upload new photo, {{$_GET['auth_user']}}</h1>

<div class="container">

	{!!Form::model($photo, ['method'=>'PUT', 'action' => ['AdminMediasController@update', $photo->id], 'files'=>true])!!}
	{{csrf_field()}}
	<img src="{{url($photo->file)}}" alt="" height="100">

	<div class="form-group">
		{!!Form::file('photo_id', null, ['class'=>'form-control'])!!}

	</div>

	<div class="form-group">
		{!!Form::submit('Upload new photo', ['class'=>'btn btn-primary'])!!}
	</div>
	{!!Form::close()!!}

	{!!Form::open(['method'=> 'DELETE', 'action' => ['AdminMediasController@destroy', $photo->id]])!!}
	<div class="form-group form-group col-sm-3">
	{!!Form::submit('Delete Photo', ['class' => 'btn btn-danger btn-lg'])!!}
	</div>
	{!!Form::close()!!}

</div>
@stop
