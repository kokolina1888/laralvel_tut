@extends('layouts.admin_master')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ URL::to('/css/modal.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('/css/categories.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('/css/common.css') }}">
@endsection

@section('content')
<div class="container">
	@include('includes.info-box')
	<div class="card">
		<header>
			<nav>
				<ul>
					<li>
						<a href="{{ route('admin.blog.create_post') }}" class="btn">New Post</a>
					</li>
					<li>
						<a href="" class="btn">Show All Posts</a>
					</li>
				</ul>

			</nav>
		</header>
		<section>
			<ul>
				@if(count($posts) === 0)
				<!-- if no posts -->
				<li>
					No Posts
				</li>
				@else 
				@foreach($posts as $post)
				<!-- if posts -->
				<li>
					<article>
						<div class="post-info">
							<h3>{{ $post->title }}</h3>
							<span class="info">{{ $post->author }}| {{ $post->created_at->diffForHumans()}}</span>
						</div>
						<div class="edit">
							<nav>
								<ul>
									<li>
										<a href="{{ route('blog.single', ['post_id'=>$post->id, 'end'=>'admin'])}}" >View Post</a>
									</li>
									<li>
										<a href="{{ route('admin.blog.post_edit', ['post_id'=>$post->id])}}" >Edit Post</a>
									</li>
									<li>
										<a href="{{ route('admin.blog.post_delete', ['post_id'=>$post->id]) }}" class="danger">Delete Post</a>
									</li>
								</ul>
							</nav>
						</div>
					</article>
				</li>

				@endforeach
				@endif
			</ul>
		</section>		
		<section class="pagination">

			@if($posts->currentPage()!==1)
			<a href="{{ $posts->previousPageUrl()}}">
				<span class="fa fa-caret-left"></span>
			</a>
			@endif
			@if($posts->currentPage()!==$posts->lastPage() && $posts->hasPages())
			<a href="{{ $posts->nextPageUrl()}}">
				<span class="fa fa-caret-right"></span>
			</a>
			@endif


		</section>
	</div>
	<div class="card">
		<header>
			<nav>
				<ul>
					<li>
						<a href="{{ route('contact') }}" class="btn">New Message</a>
					</li>
					<li>
						<a href="{{ route('admin.contact.index') }}" class="btn">Show All Messages</a>
					</li>
				</ul>

			</nav>
		</header>
		<section>
			<ul>
				@if(count($contact_messages) === 0)
				<li>No Messages</li>
				@endif
				@foreach($contact_messages as $contact_message)
				<li>
					<article data-message = "{{$contact_message->body}}" data-id = "{{$contact_message->id}}" class="contact-message">
						<div class="message-info">
							<h3>{{ $contact_message->subject }}</h3>			
						</div>			

						<div class="edit">
							<span class="info">Sender: {{ $contact_message->sender }}|{{ $contact_message->created_at->diffForHumans() }} </span>
							

						</div>
					</article>
				</li>
				@endforeach
			</ul>
		</section>
	</div>
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


@endsection