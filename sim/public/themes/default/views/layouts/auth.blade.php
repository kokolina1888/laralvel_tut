<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')&mdash: The Sunday Sim</title>
	<link rel="stylesheet" type="text/css" href="{{ theme('/css/backend.css') }}">
</head>
<body>
	<div class="container">
		<div class="row vertical-center">
			<div class="col-md-4">
				<div class="col-md-4">
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">
							@yield('heading')
						</h2>
					</div>
					<div class="panel-body">
						@yield('content')
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>