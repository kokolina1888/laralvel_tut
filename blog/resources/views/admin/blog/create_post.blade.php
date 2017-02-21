@extends('layouts.admin_master')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ URL::to('/css/form.css') }}">
@endsection
@section("content")
<div class="container">
	@include('includes.info-box')
	<form action="{{ route('admin.blog.post_create') }}" method="post">
		<div class="input-group">
		@if ($errors->has('title'))
			<section class="info-box fail">

				{{ $errors->first('title') }}
				
			</section>
			@endif
			<label for="title">Post Title</label>
			<input type="text" name="title" id="title" {{ $errors->has('title')?'class=has-errors':''}} value="{{ Request::old('title') }}">
		</div>
		<div class="input-group">
			<label for="author">Post Author</label>
			<input type="text" name="author" id="author" {{ $errors->has('author')?'class=has-errors':''}} value="{{ Request::old('author') }}">
		</div>
		<div class="input-group">
			<label for="category_select">Category</label>
			<select name="category_select" id="category_select">
			@foreach($categories as $category)
				<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
			<button type="button" class="btn">Add Category</button>

		</div>

		<div class="added_categories">
			<ul></ul>
			<input type="hidden" name="categories" id="categories">
		</div>
		<div class="input-group">
			<label for="body">Post Content</label>
			<textarea id="body" name="body" {{ $errors->has('body')?'class=has-errors':''}} value="{{ Request::old('body') }}"></textarea>
		</div>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
		<button type="submit" class="btn">Create Post</button>

	</form>
</div>
@endsection
@section('script')
<script type="text/javascript">
		var token = "{{ Session::token() }}";
	</script>
	<script type="text/javascript" src="{{ URL::to('js/post.js') }}"></script>
@endsection