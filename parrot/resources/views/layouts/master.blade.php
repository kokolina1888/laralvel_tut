<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to TODOParrot</title>
</head>
<body>
	<div class="container">
		<div class="col-md-9">
			@yield('content')
		</div>

		<div class="col-md-3">
			@section('advertisement')
			<p>
				Jamz and Sun Lotion Special $29!
			</p>
			@show
		</div>
	</div>
</body>
</html>