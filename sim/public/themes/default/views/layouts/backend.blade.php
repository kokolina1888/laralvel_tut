<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="{{ theme('/css/backend.css') }}">
	<script type="text/javascript" src="{{ theme('/js/all.js')}}"></script>
</head>
<body>

<nav class="navbar navbar-static-top navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a href="{{ url('/home') }}" class="navbar-brand">The Sunday Sim</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
				<li><a href="{{ route('users.index') }}">Users</a></li>
				<li><a href="{{ route('pages.index') }}">Pages</a></li>
				<li><a href="{{ route('blog.index') }}">Blog Posts</a></li>
				
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><span class="navbar-text">Hello, {{ $admin->name }}</span></li>
				<li> <a href="{{ url('/logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
					Logout
				</a>
			</li>
			<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>

		</ul>
	</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>@yield('title')</h3>
				@if(count($errors)>0)
						<div class="alert alert-danger">
							<strong>We found some errors</strong>
							<ul>
								@foreach($errors->all() as $error)
								<li>
									{{ $error }}
								</li>
								@endforeach
							</ul>
						</div>
						@endif
						@if($status)
						<div class="alert alert-info">
						{{$status}}
						</div>
						@endif

				@yield('content')
			</div>
		</div>
	</div>
</body>
</html>