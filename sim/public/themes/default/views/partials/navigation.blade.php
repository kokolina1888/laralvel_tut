@foreach($pages as $page)
<li class="{{ (Route::getCurrentRoute()->getPath() == ($page->url)) ? 'active' : '' }} {{ count($page->children ) ? ($page->isChild() ? 'dropdown-submenu' : 'dropdown') : '' }}">
	<a href="{{ url($page->url) }}">{{ $page->title }}

	@if(count($page->children))
	<span class="caret {{ $page->isChild() ? 'right' : ''}}"></span>
	@endif
	</a>

	@if(count($page->children))
	<ul class="dropdown-menu">
		@include('partials.navigation', ['pages'=>$page->children])
	</ul>
	@endif
</li>
@endforeach
