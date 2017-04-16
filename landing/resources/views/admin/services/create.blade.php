@extends('admin.index')
@section('content')
<div class="wrapper container-fluid">
	@if(count($errors)>0)
	<div class="alert alert-danger">

		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	{!!Form::open(['method'=>'POST', 'class'=>'form-horizontal', 'action' => 'ServicesController@store'])!!}	
	
	<div class="form-group">
		
		{!! Form::label('name','Name',['class' => 'col-xs-2 control-label'])   !!}
		<div class="col-xs-8">
			{!! Form::text('name',old('name'),['class' => 'form-control','placeholder'=>'Enter service name'])!!}
		</div>

	</div>

	<div class="form-group">
		{!! Form::label('icon', 'Icon:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-xs-8">
			{!! Form::text('icon', old('position'), ['class' => 'form-control','placeholder'=>'Enter service icon']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('text', 'Text:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-xs-8">
			{!! Form::textarea('text', old('text'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Enter service text']) !!}
		</div>
	</div>

	


	<div class="form-group">
		<div class="col-xs-offset-2 col-xs-10">
			{!! Form::button('Save', ['class' => 'btn btn-primary','type'=>'submit']) !!}
		</div>
	</div>
	
	
	
	{!! Form::close() !!}
	
	<script>
		CKEDITOR.replace('editor');
	</script>
	
</div>


@endsection