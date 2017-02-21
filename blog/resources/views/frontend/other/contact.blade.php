@extends('layouts.master')

@section('title')
Contact
@endsection

@section('styles')
<link rel="stylesheet" href="{{ URL::to('/css/form.css')}}">
@endsection

@section('content')
@include('includes.info-box')
<form action="{{ route('contact.send') }}" method="post" id="contact-form">
	<div class="input-group">
		<label for="name">Your Name</label>
		<input type="text" name="name" id="name">
	</div>
	<div class="input-group">
		<label for="email">Your Email</label>	
		<input type="text" name="email" id="email" value="{{ Request::old('email') }}">
	</div>
	<div class="input-group">
		<label for="subject">Subject</label>
		<input type="text" name="subject" id="subject" value="{{ Request::old('subject') }}">
	</div>
	<div class="input-group">
		<label for="body">Your Message</label>
		<textarea id="body" name="body" value="{{ Request::old('body') }}"></textarea>
	</div>
	<input type="hidden" name="_token" value="{{ Session::token() }}">
	<button type="submit" class="btn">Send Message</button>

</form>

@endsection