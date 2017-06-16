@extends('layouts.master')

@section('content')
<div class="col-sm-8 blog-main">
@if($flash = session('message'))
<div class="alert alert-success" role="alert">
	{{ $flash }}
</div>
@endif
	<div class="blog-post">
		@foreach($posts as $post)
		@include('posts.post')
		@endforeach	
	</div>
	<nav class="blog-pagination">
		<a href="#" class="btn btn-outline-primary">Older</a>
		<a href="#" class="btn btn-outline-secondary disabled">Newer</a>
	</nav>
</div>
@endsection

@section('footer')

@endsection