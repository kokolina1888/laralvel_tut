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
	{!!Form::open(['method'=>'POST', 'class'=>'form-horizontal', 'action' => 'PagesController@store', 'files'=>true])!!}
	
	
	<div class="form-group">
		
		{!! Form::label('name','Name',['class' => 'col-xs-2 control-label'])   !!}
		<div class="col-xs-8">
			{!! Form::text('name',old('name'),['class' => 'form-control','placeholder'=>'Enter page name'])!!}
		</div>

	</div>

	
	<div class="form-group">
		{!! Form::label('alias', 'Alias:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-xs-8">
			{!! Form::text('alias', old('alias'), ['class' => 'form-control','placeholder'=>'Enter page alias']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('text', 'Text:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-xs-8">
			{!! Form::textarea('text', old('text'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Enter page text']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('images', 'Image:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-xs-8">
			{!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Choose Image','data-buttonName'=>"btn-primary",'data-placeholder'=>"No file chosen"]) !!}
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