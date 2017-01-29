@extends('layouts.admin')
@section('content')
<h1>Categories</h1>
<div class="col-sm-6">
	<table class="table">
		<thead>
			<th>name</th>
			<th>Created data</th>
			<th></th>
		</thead>
		<tbody>
			@foreach($categories as $category)
			<tr>
			<td>{{$category->name}}</td>
			<td>{{$category->created_at->diffForHumans()}}</td>
			<td><a href="{{route('categories.edit', ['cat_id'=>$category->id, 'auth_user'=>Auth::user()->name])}}">Edit Category</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection