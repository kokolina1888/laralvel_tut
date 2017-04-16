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
	{!!Form::model($people, ['method'=>'PATCH', 'class'=>'form-horizontal', 'action' => ['PeoplesController@update', $people->id], 'files'=>true])!!}	
	
	<div class="form-group">
		{!! Form::hidden('id', $people->id) !!}

		{!! Form::label('name','Name',['class' => 'col-xs-2 control-label'])   !!}
		<div class="col-xs-8">
			{!! Form::text('name',$people->name,['class' => 'form-control'])!!}
		</div>

	</div>

	<div class="form-group">
		{!! Form::label('position', 'Position:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-xs-8">
			{!! Form::text('position', $people->position, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('images', 'Image:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-xs-8">
			{!! Html::image('assets/user_img/'.$people->images,'',['class'=>'img-circle img-responsive','width'=>'150px']) !!}
			{!! Form::hidden('old_images', $people->images) !!}
			{!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Choose Image','data-buttonName'=>"btn-primary",'data-placeholder'=>"No file chosen"]) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('text', 'Text:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-xs-8">
			{!! Form::textarea('text', $people->text, ['id'=>'editor','class' => 'form-control']) !!}
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