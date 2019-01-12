<!DOCTYPE html>
<html>
<head></head>
<body>

<ul id="auth_menu">
    @if(Auth::user())
        <li><a href="{{ url('/profile') }}">Profile</a></li>
        <li><a href="/threads">Threads</a></li>
        <li><a href="{{ url('/logout') }}">Logout</a></li>
    @else
        <li><a href="{{ url('/register') }}">Register</a></li>
        <li><a href="{{ url('/login') }}">Login</a></li>
    @endif
</ul>

@yield('body')

</body>
</html>