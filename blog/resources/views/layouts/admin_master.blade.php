<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
<title>Admin area</title>
<link rel="stylesheet" type="text/css" href="{{ URL::to('/css/admin.css')}}">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@yield('styles')

</head>

<body>
	@include('includes.admin_header')
	@yield('content')
	<script type="text/javascript" >
		var baseURL = "{{ URL::to('/')}}";
	</script>
	@yield('script')
</body>
</html>