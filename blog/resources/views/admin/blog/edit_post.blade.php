@extends('layouts.admin_master')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ URL::to('/css/form.css') }}">
@endsection
@section("content")
<div class="container">
	@include('includes.info-box')
	<form action="{{ route('admin.blog.post_update') }}" method="post">
		<div class="input-group">
		@if ($errors->has('title'))
			<section class="info-box fail">
				{{ $errors->first('title') }}				
			</section>
			@endif
			<label for="title">Post Title</label>
			<input type="text" name="title" id="title" {{ $errors->has('title')?'class=has-errors':''}} value="{{ Request::old('title')?Request::old('title'):isset($post)?$post->title:'' }}">
		</div>
		<div class="input-group">
			<label for="author">Post Author</label>
			<input type="text" name="author" id="author" {{ $errors->has('author')?'class=has-errors':''}} value="{{ Request::old('author')?Request::old('author'):isset($post)?$post->author:'' }}">
		</div>
		<div class="input-group">
			<label for="category_select">Category</label>
			<select name="category_select" id="category_select">
				@foreach($categories as $category)
				<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
		</div>
		<button type="button" class="btn">Add Category</button>

		<div class="added_categories">
			<ul>
				@foreach($post_categories as $post_category)

				<li>
					<a href="#" data-category_id = '{{ $post_category->id }}'>{{ $post_category->name }}</a>
				</li>
				@endforeach
			</ul>
			<input type="hidden" name="categories" id="categories" value="{{ implode(',', $post_categories_ids)}}">
		</div>
		<div class="input-group">
			<label for="body">Post Content</label>
			<textarea id="body" name="body" {{ $errors->has('body')?'class=has-errors':''}} >{{ Request::old('body')?Request::old('body'):isset($post)?$post->body:'' }}</textarea>
		</div>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="hidden" name="post_id" value="{{ $post->id }}">
		<button type="submit" class="btn">Update Post</button>

	</form>
</div>
@endsection
@section('script')
<script type="text/javascript">
		var token = "{{ Session::token() }}";
	</script>
	<script type="text/javascript" src="{{ URL::to('js/post.js') }}"></script>@endsection