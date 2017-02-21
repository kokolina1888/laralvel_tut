<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


	<link rel="stylesheet" href="{{ URL::to('/css/main.css')}}">
	@yield('styles')
</head>
<body>
@include('includes.header')
	<div class="main">
		@yield('content')
	</div>
@include('includes.footer')

</body>
</html>