@extends('layouts.master')

@section('title')
Trending quotes
@endsection

@section('styles')

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection

@section('content')

@include('header')

@if(!empty(Request::segment(1)))
<section class="filter-bar">
	<a href="{{route('index')}}">Show All Quotes</a>
	<a href="{{route('admin.dashboard')}}">Show All Authors</a>
</section>
@endif

<section class="quotes">
	<h1>Latest Quotes</h1>
	@for($i = 0; $i < count($quotes); $i++)
	<article class="quote {{($i%3===0)?'first-in-line':(($i+1)%3 === 0?'last-in-line':'')}}">
	<a href="{{ route('delete', ['quote_id' => $quotes[$i]->id])}}">x</a>
	{{ $quotes[$i]->quote }}
	
	<div class="info">
		Created by <a href="{{route('index', ['author'=>$quotes[$i]->author->name])}}">{{ $quotes[$i]->author->name}}</a> on {{ $quotes[$i]->created_at}}
	</div>
	</article>
	@endfor
	<div class="pagination">
	@if($quotes->currentPage()!==1)
	<a href="{{ $quotes->previousPageUrl()}}">
		<span class="fa fa-caret-left"></span>
	</a>
	@endif
	@if($quotes->currentPage()!==$quotes->lastPage() && $quotes->hasPages())
	<a href="{{ $quotes->nextPageUrl()}}">
		<span class="fa fa-caret-right"></span>
	</a>
	@endif

	</div>
</section>


<section class="edit-quote">
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

	<h1>Add a Quote</h1>
	<form method="post" action="{{route('create')}}">
		<div class="input-group">
			<label for="author">Your Name</label>
			<input type="text" name="author" id="author" placeholder="Your Name">
		</div>
		<div class="input-group">
			<label for="email">Your Email</label>
			<input type="text" name="email" id="email" placeholder="Your Email">
		</div>
		<div class="input-group">
			<label for="quote">Your Quote</label>
			<textarea id="quote" name="quote"></textarea>
		</div>
		<input type="hidden" name="_token" value="{{Session::token()}}">

		<input type="submit" name="submit" class="btn" value="Submit Quote">
	</form>
</section>

@endsection