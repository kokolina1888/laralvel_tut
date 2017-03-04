@extends('layouts.backend')
@section('title', 'Dashboard')
@section('content')

<div class="row">
	<div class="col-md-6">
		<ul class="list-group">
			@foreach($posts as $post)
			<li class="list-group-item">
			<h4>
			<a href="#">{{ $post->title }}</a>
			<a href="{{ route('blog.edit', $post->id) }}" class="pull-right"><span class="glyphicon glyphicon-edit"></span></a>
			</h4>
			{!! Markdown::convertToHtml($post->excerpt);!!}
			{!! Markdown::convertToHtml($post->body);!!}
			</li>
			

			@endforeach

		</ul>
	</div>
	<div class="col-md-6">
		<ul class="list-group">
			@foreach($users as $user)
			<li class="list-group-item">
			<h4>
			<a href="#">{{ $user->name }}</a>
			<a href="{{ route('users.edit', $user->id) }}" class="pull-right"><span class="glyphicon glyphicon-edit"></span></a>
			</h4>
			Last login: {{ $user->present()->lastLoginDifference}}
			</li>
			

			@endforeach

		</ul>

	</div>
</div>
@endsection
