@extends('layouts.master')

@section('content')
<div class="col-sm-8 blog-main">
	<div class="blog-post">

		<h1>
			{{ $post->title }}
		</h1>
		<p>
			{{ $post->body }}
		</p>
		@if($post->comments)
		@foreach($post->comments as $comment)
		{{ $comment->created_at}}
		{{ $comment->body}}
		@endforeach
		@endif

	</div>
	<div class="row">
	<div class="card">
		<div class="card-block">
			<form method="post" action="{{ route('comments.store', $post->id)}}">
				
				{{ csrf_field() }}
				<div class="form-group">
					<textarea name="body" class="form-control">
						your comment here
					</textarea>
				</div>
				<button class="btn btn-primary">Add Comment</button>
			</form>
		</div>
	</div>
	</div>
	@endsection

	

	