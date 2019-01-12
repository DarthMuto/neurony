<?php
/**
 * @var \App\Models\Thread[]|\Illuminate\Support\Collection $threads
 */
?>
@extends('admin.layout')
@section('body')
    <form action="{{ url('/admin/delete') }}" method="post">
        {{ csrf_field() }}
        @foreach($threads as $thread)
            <li>
                <input type="checkbox" name="thread_ids[]" value="{{ $thread->id }}"/>
                #{{ $thread->id }}
                {{ $thread->title }}
                Author: {{ $thread->user->email }}, {{ $thread->created_at }}
            </li>
        @endforeach
        <input type="submit" value="Delete selected"/>
    </form>
@endsection