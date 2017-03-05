@extends('app')
@section('content')

<h2>Contact WeDewLawns</h2>

@if (count($errrors) > 0)
<div class="alert alert-danger">
	<p>Please correct the following errors</p>
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error}}</li>
		@endforeach
	</ul>
</div>
@endif
@endsection