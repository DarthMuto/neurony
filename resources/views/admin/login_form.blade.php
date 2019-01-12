@extends('admin.layout')
@section('body')
    <form action="{{ url('/admin/login') }}" method="post">
        {{ csrf_field() }}
        {{ session()->has('message') ? session()->get('message') : '' }}
        <div>
            Email:
            <input type="text" name="email" value="{{ old('email') }}"/>
            @foreach($errors->get('email') as $err)
                <br/>{{ $err }}
            @endforeach
        </div>
        <div>
            Password:
            <input type="password" name="password"/>
            @foreach($errors->get('password') as $err)
                <br/>{{ $err }}
            @endforeach
        </div>
        <div>
            <input type="submit" value="Login"/>
        </div>
    </form>
@endsection