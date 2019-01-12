<?php
/**
 * @var \App\Models\Thread|null $thread
 */
?>
@extends('layout')
@section('body')
    <form action="/profile/thread" method="post">
        {{ csrf_field() }}
        @if($thread)
            <input type="hidden" name="id" value="{{ $thread->id }}"/>
        @endif
        <div>
            Title:
            <input type="text" name="title" value="{{ old('title') ?? $thread->title ?? '' }}"/>
            @foreach($errors->get('title') as $err)
                <br/>{{ $err }}
            @endforeach
        </div>
        <div>
            Content:
            <textarea name="content">{{ old('content') ?? $thread->content ?? '' }}</textarea>
            @foreach($errors->get('content') as $err)
                <br/>{{ $err }}
            @endforeach
        </div>
        @if($thread)
            <div>
                Delete thread
                <input type="checkbox" name="delete" value="1"/>
            </div>
        @endif
        <div>
            <input type="submit" value="{{ $submit }}"/>
        </div>
    </form>
@endsection
