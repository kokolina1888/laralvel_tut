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
	{!!Form::model($service, ['method'=>'PATCH', 'class'=>'form-horizontal', 'action' => ['ServicesController@update', $service->id]])!!}	
	
	<div class="form-group">
    	{!! Form::hidden('id', $service->id) !!}
		
		{!! Form::label('name','Name',['class' => 'col-xs-2 control-label'])   !!}
		<div class="col-xs-8">
			{!! Form::text('name', $service->name,['class' => 'form-control'])!!}
		</div>

	</div>

	<div class="form-group">
		<div class="service_icon"> <span style="margin-left: 27px"><i class="fa {{ $service->icon}}" aria-hidden="true"></i></span> </div>
		{!! Form::label('icon', 'Icon:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-xs-8">
			{!! Form::text('icon', $service->icon, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('text', 'Text:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-xs-8">
			{!! Form::textarea('text', $service->text, ['id'=>'editor','class' => 'form-control']) !!}
		</div>
	</div>

	


	<div class="form-group">
		<div class="col-xs-offset-2 col-xs-10">
			{!! Form::button('Update', ['class' => 'btn btn-primary','type'=>'submit']) !!}
		</div>
	</div>
	
	
	
	{!! Form::close() !!}
	
	<script>
		CKEDITOR.replace('editor');
	</script>
	
</div>


@endsection