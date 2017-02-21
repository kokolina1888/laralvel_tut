<header class="top-nav">
	<nav>
		<ul>
			<li {{ Request::is('')?'class = active':''}}>
				<a href="">DashBoard</a>
			</li>
			<li {{Request::is('admin')?'class = active':''}}>
				<a href="{{ route('admin.index') }}">Posts</a>
			</li>
			<li {{Request::is('admin/blog/categories')?'class = active':''}}>
				<a href="{{ route('admin.blog.categories') }}">Categories</a>
			</li>
			<li {{Request::is('/admin/contact')?'class = active':''}}>
				<a href="{{ route('admin.contact.index') }}">Contact Message</a>
			</li>
			<li>
				<a href="{{ route('admin.logout') }}">LogOut</a>
			</li>
		</ul>
	</nav>
</header>