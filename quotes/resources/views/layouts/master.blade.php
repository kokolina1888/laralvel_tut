<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{url('/css/main.css')}}">
	@yield('styles')
</head>
<body>
	@yield('content')
</body>
</html>