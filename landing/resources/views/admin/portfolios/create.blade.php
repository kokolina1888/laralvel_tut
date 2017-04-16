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
	{!!Form::open(['method'=>'POST', 'class'=>'form-horizontal', 'action' => 'PortfoliosController@store', 'files'=>true])!!}
	
	<div class="form-group">
		{!! Form::label('name', 'Name:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-xs-8">
			{!! Form::text('name', old('name'), ['class' => 'form-control','placeholder'=>'Enter portfolio name']) !!}
		</div>
	</div>
	<div class="form-group">
		
		{!! Form::label('filter_id','Tag',['class' => 'col-xs-2 control-label'])   !!}
		<div class="col-xs-8">
			{!! Form::select('filter_id', ['' => 'options'] + $tags, null, ['class'=>'form-control'])!!}
		</div>

	</div>
	

	<div class="form-group">
		{!! Form::label('images', 'Image:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-xs-8">
			{!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Choose Image','data-buttonName'=>"btn-primary", 'data-placeholder'=>"No file chosen"]) !!}
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