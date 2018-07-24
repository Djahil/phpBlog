@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">DASHBOARD</h1>
    <div style="text-align: center; margin-top: 100px;">
            @if(Auth::user()->isAdmin())
                <a href="{{route("users.index")}}" class="btn btn-primary btn-lg">Users</a>
            @endif

            @if(Auth::user()->isAuthor() || Auth::user()->isAdmin())
                 <a href="{{route("posts.index")}}" class="btn btn-primary btn-lg">Posts</a>
                 <a href="{{route("categories.index")}}" class="btn btn-primary btn-lg">Categories</a>
            @endif

            @if(Auth::user()->isModerator() || Auth::user()->isAdmin())
                <a href="{{route("comments.index")}}" class="btn btn-primary btn-lg">Comments</a>
            @endif

    </div>

@stop