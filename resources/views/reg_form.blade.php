@extends('layout')
@section('body')
    <form action="{{ url('/register') }}" method="post">
        {{ csrf_field() }}
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
            Confirm password:
            <input type="password" name="password_confirmation"/>
        </div>
        <div>
            <input type="submit" value="Register"/>
        </div>
    </form>
@endsection