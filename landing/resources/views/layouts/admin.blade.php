<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximum-scale=1">
	<title>{{$data['title']}}</title>
	<link rel="icon" href="favicon.png" type="image/png">
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"> 
	<link href="{{asset('/assets/css/font-awesome.css')}}" rel="stylesheet" type="text/css"> 


	<script type="text/javascript" src="{{asset('assets/js/jquery-1.11.0.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/ckeditor/ckeditor.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/bootstrap-filestyle.min.js')}}"></script>
	
</head>
<body>

	<header id="header_wrapper">
		@yield('header') 	

	</header>
	@yield('content')
</body>
</html>
