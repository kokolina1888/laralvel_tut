<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header page-scroll">
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="navbar-main">
				<span class="sr-only">
					Toggle Navigation
				</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="/" class="navbar-brand">
				{{ config('blog.name') }}
			</a>

		</div>
		<div class="collapse navbar-collapse" id="navbar-main">
			<ul class="nav navbar-nav">
				<li>
					<a href="/">Home</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="/contact">Contact</a>
				</li>
			</ul>
		</div>
	</div>
</nav>