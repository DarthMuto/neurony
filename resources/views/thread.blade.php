<?php
/**
 * @var \App\Models\Thread $thread
 */
?>
@extends('layout')
@section('body')
    <p>
        <b>{{ $thread->title }}</b><br/>
        {{ $thread->content }}<br/>
        Author: {{ $thread->user->email }}, {{ $thread->created_at }}
    </p>
    @foreach($thread->thread_messages as $message)
        <p>
            {{ $message->content }}<br/>
            Author: {{ $message->user->email }}, {{ $message->created_at }}
        </p>
    @endforeach
    <form action="/thread/{{ $thread->id }}" method="post">
        {{ csrf_field() }}
        <div>
            <textarea name="content">{{ old('content') }}</textarea>
            @foreach($errors->get('content') as $err)
                <br/>{{ $err }}
            @endforeach
        </div>
        <div>
            <input type="submit" value="Post comment"/>
        </div>
    </form>
@endsection
