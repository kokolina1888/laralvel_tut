<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to TODOParrot</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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