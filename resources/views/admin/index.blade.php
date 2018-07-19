@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">DASHBOARD</h1>
    <div style="text-align: center; margin-top: 100px;">
            @if(Auth::user()->isAdmin())
                <a href="{{route("posts.index")}}">Posts</a>
                <a href="{{route("categories.index")}}">Categories</a>
                <a href="{{route("comments.index")}}">Comments</a>
                <a href="{{route("users.index")}}">Users</a>
            @endif

            @if(Auth::user()->isModerator())
                <a href="{{route("comments.index")}}">Comments</a>
            @endif

            @if(Auth::user()->isAuthor())
                <a href="{{route("posts.index")}}">Posts</a>
            @endif
    </div>

@stop