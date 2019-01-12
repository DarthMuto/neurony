<?php
/**
 * @var \App\Models\User $user
 */
?>
@extends('layout')
@section('body')
    <div>
        Logged in as: {{ $user->email }}
    </div>
    <ul>
        @foreach($user->threads as $thread)
            <li><a href="{{ url('/profile/thread/' . $thread->id) }}">#{{ $thread->id }} {{ $thread->title }}</a></li>
        @endforeach
    </ul>
    <a href="{{ url('/profile/new-thread') }}">New thread</a>
@endsection
