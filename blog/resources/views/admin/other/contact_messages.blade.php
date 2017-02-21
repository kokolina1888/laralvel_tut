@extends('layouts.admin_master')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ URL::to('/css/modal.css')}}">
@endsection

@section('content')
<div class="container">
	<section class="list">
		@if(count($contact_messages) === 0)
		No messages
		@endif

		@foreach($contact_messages as $contact_message)
		<article data-message="{{$contact_message->body}}" data-id="{{ $contact_message->id }}" class="contact-message">
			<div class="message-info">
				<h3>{{ $contact_message->subject }}</h3>			
			</div>			
			
			<div class="edit">
			<span class="info">Sender: {{ $contact_message->sender }} </span>
				<nav>
					<ul>
						<li><a href="#">Show Message</a></li>
						<li><a href="#" class="danger">Delete</a>
						</li>
					</ul>
				</nav>

			</div>

		</article>
		@endforeach	
	</section>

	@if($contact_messages->lastPage()>1)
	<section class="pagination">
		@if($contact_messages->currentPage()!==1)
		<a href="{{ $contact_messages->previousPageUrl()}}">
			<span class="fa fa-caret-left"></span>
		</a>
		@endif
		@if($contact_messages->currentPage()!==$contact_messages->lastPage() && $contact_messages->hasPages())
		<a href="{{ $contact_messages->nextPageUrl()}}">
			<span class="fa fa-caret-right"></span>
		</a>
		@endif
	</section>
	@endif
</div>
<div class="modal" id="contact-message-info">
<button class="btn" id="modal-close">close</button>
	
</div>
@endsection

@section('script')
<script type="text/javascript">
	var token="{{ Session::token( )}}";


</script>
<script type="text/javascript" src="{{URL::to('js/modal.js')}}"></script>
<script type="text/javascript" src="{{URL::to('js/contact_messages.js')}}"></script>
<script type="text/javascript" src="{{ URL::to('js/categories.js') }}"></script>

@endsection