<header>
	<nav class="main-nav">
		<ul>
			<li {{ Request::is('')?'class = active':''}}><a href="{{ route('blog.index') }}">Blog</a></li>
			<li {{ Request::is('about')?'class = active':''}}><a href="{{ route('about') }}">About Me</a></li>
			<li {{ Request::is('contact')?'class = active':''}}><a href="{{ route('contact') }}">Contact</a></li>
			<li {{ Request::is('contact')?'class = active':''}}><a href="{{ route('admin.login') }}">logIn</a></li>
			
		</ul>
	</nav>
</header>