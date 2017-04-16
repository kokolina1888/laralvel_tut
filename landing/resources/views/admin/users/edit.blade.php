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
	{!!Form::model($user, ['method'=>'PATCH', 'class'=>'form-horizontal', 'action' => ['UsersController@update', $user->id]])!!}	
	
	<div class="form-group">
    	{!! Form::hidden('id', $user->id) !!}
		
		{!! Form::label('email','Email',['class' => 'col-xs-2 control-label'])   !!}
		<div class="col-xs-8">
			{!! Form::text('email', $user->email,['class' => 'form-control'])!!}
		</div>

	</div>

	<div class="form-group">
    	
		{!! Form::label('role','Role',['class' => 'col-xs-2 control-label'])   !!}
		<div class="col-xs-8">
			{!! Form::select('role', $roles, $user->role, ['class' => 'form-control'])!!}
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