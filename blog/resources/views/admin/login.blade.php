@extends('layouts.admin_master')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ URL::to('/css/form.css') }}">
@endsection

@section('content')
<div class="container">
@include('includes.info-box')
<form action="{{ route('admin.login') }}" method="post">
	<div class="input-group">
	<label for="email">email</label>
		<input type="text" name="email" id="email" class="{{ $errors->has('email') ? 'has-error':''}}"value="{{ Request::old('email')}}">

	</div>
	<div class="input-group">
	<label for="password">password</label>
		<input type="text" name="password" id="password" class="{{ $errors->has('password') ? 'has-error':''}}">		
	</div>
	<input type="hidden" name="_token" value="{{ Session::token() }}">
	<button type="submit" class="btn">LogIn</button>
</form>
</div>
@endsection