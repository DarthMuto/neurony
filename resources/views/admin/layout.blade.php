<!DOCTYPE html>
<html>
<head></head>
<body>

@if(\Illuminate\Support\Facades\Auth::guard('admin')->id())
    <a href="{{ url('/admin/logout') }}">Admin logout</a>
@endif

@yield('body')

</body>
</html>