@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">DASHBOARD</h1>
    <div style="text-align: center; margin-top: 100px;">
        <a href="{{route("posts.index")}}">Posts</a>
        <a href="{{route("categories.index")}}">Categories</a>
        <a href="{{route("comments.index")}}">Comments</a>
    </div>

@stop