@extends('layouts.master')

@section('content')


<form action="{{ route('posts.store')}}" role="form" method="POST" class="form-horizontal">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	@include('partials.errors')
	<div class="form-group">
		<label for="title" class="col-md-3 control-label">
			title
		</label>
		<div class="col-md-8">
			<input type="text" name="title" id="title"  class="form-control" value="">
		</div>
	</div>
	<div class="form-group">
		<label for="body" class="col-md-3 control-label">
			body 	
		</label>
		<div class="col-md-8">
			<textarea name="body" id="body" class="form-control">

			</textarea>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<div class="col-md-10 col-md-offset-2">
				<button type="submit" class="btn btn-primary btn-lg">
					<i class="fa fa-disk-o">

					</i>
					Save New Post
				</button>
			</div>
		</div>
	</div>
</form>
@endsection