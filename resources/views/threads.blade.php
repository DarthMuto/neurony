<?php
/**
 * @var \App\Models\Thread[] $threads
 * @var ?string filter
 * @var string $order
 */
?>
@extends('layout')
@section('body')
    Threads: <a href="{{ url('/threads/newest') }}">newest</a> | <a href="{{ url('threads/alpha') }}">alphabetically</a>
    <ul>
        @foreach($threads as $thread)
            <li>
                <a href="{{ url('/thread/' . $thread->id) }}">#{{ $thread->id }} {{ $thread->title }}</a>
                <p>{{ $thread->content }}</p>
            </li>
        @endforeach
    </ul>
@endsection