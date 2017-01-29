@extends('layouts.admin')

@section('content')
<h1>Edit Category, {{$_GET['auth_user']}}</h1>

<div class="container">
	<div class="row">
		<div class="col-sm-6">

			{!!Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]])!!}

			<div class="form-group">
				{!!Form::label('name', 'Name')!!}
				{!!Form::text('name', null, ['class'=>'form-control'])!!}
			</div>

			<div class="form-group">
				{!!Form::submit('Update Category', ['class'=>'btn btn-primary'])!!}
			</div>
			{!!Form::close()!!}
		</div>
		<div class="col-sm-3">
			{!!Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]])!!}
				{!!Form::submit('Delete Category', ['class'=>'btn btn-danger'])!!}

			{!!Form::close()!!}

		</div>
	</div>
</div>
@endsection