@extends('layouts.admin_master')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ URL::to('/css/form.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('/css/categories.css') }}">
@endsection
@section("content")

<div class="container">
	<section id="category-admin">
		<form >
			<div class='input-group'>
				<label for="name">Category Name</label>
				<input type="text" name="name">
				<button type="submit" class="btn">Create Category</button>
			</div>
		</form>
		<p id="info-p"></p>
	</section>
	<section class="list">
	@foreach($categories as $category)
	<article>
		<div class="category-info" data-id="{{ $category->id }}">
			<h3>{{ $category->name }}</h3>			
		</div>
		<div class="edit">
		<nav>
			<ul>
				<li class="category-edit"><input type="text" name=""></li>
				<li><a href="#" >Edit</a> </li>
					<li><a href="#" class="danger">Delete</a>
				</li>
			</ul>
		</nav>
			
		</div>
	</article>
		@endforeach	
		</section>
		<section class="pagination">
	
	@if($categories->currentPage()!==1)
	<a href="{{ $categories->previousPageUrl()}}">
		<span class="fa fa-caret-left"></span>
	</a>
	@endif
	@if($categories->currentPage()!==$categories->lastPage() && $categories->hasPages())
	<a href="{{ $categories->nextPageUrl()}}">
		<span class="fa fa-caret-right"></span>
	</a>
	@endif

	
	</section>
	</div>
@endsection
	@section('script')
	<script type="text/javascript">
		var token = "{{ Session::token() }}";
	</script>
	<script type="text/javascript" src="{{ URL::to('js/categories.js') }}"></script>
	@endsection

