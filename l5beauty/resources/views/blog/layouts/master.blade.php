<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="{{ $meta_description }}">
	<meta name="author" content="{{ config('blog.author') }}">
	<title>{{ $title or config('blog.title') }}</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/blog.css">
	<link rel="alternate" type="application/rss+xml" href="{{ url('rss') }}" title="RSS Feed {{ config('blog.title') }}">
@yield('styles')

</head>
<body>
@include('blog.partials.page-nav')

@yield('page-header')

@yield('content')

@include('blog.partials.page-footer')

<script type="text/javascript" src="/assets/js/blog.js"></script>
@yield('scripts')
	
</body>
</html>