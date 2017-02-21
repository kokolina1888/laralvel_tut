<a href="{{ route('admin.login') }}"></a>
@if(Auth::check())
<a href="{{ route('admin.logout') }}">LogOut</a>
@endif