<?php
/**
 * @var \App\Models\Thread[] $threads
 * @var ?string $filter
 * @var string $order
 */
?>
@extends('layout')
@section('body')
    <form action="?" method="get">
        Filter by user(s): <input type="text" name="filter" value="{{ $filter }}"/>
        <input type="submit" value="Apply filter"/>
    </form>
    Threads: <a href="{{ url('/threads/newest?filter=' . $filter) }}">newest</a> | <a href="{{ url('threads/alpha?filter=' . $filter) }}">alphabetically</a>
    <ul>
        @foreach($threads as $thread)
            <li>
                <a href="{{ url('/thread/' . $thread->id) }}">#{{ $thread->id }} {{ $thread->title }}</a>
                <p>{{ $thread->content }}</p>
            </li>
        @endforeach
    </ul>
@endsection