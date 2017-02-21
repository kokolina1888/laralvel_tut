@extends('layouts.master')

@section('content')
@if(count($errors)>0)
<section class="info-box fail">
	@foreach($errors->all() as $error)
	{{ $error }}
	@endforeach
</section>
@endif
@if(Session::has('message'))
<div class="info-box success">
	{{ Session::get('message') }}
</div>
@endif
<form action="{{ route('admin.login') }}" method="post">
	<input type="text" name="author">
	<input type="password" name="password">
	<input type="hidden" name="_token" value="{{ Session::token() }}">
	<input type="submit" value="submit">
</form>

@endsection