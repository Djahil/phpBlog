@extends('layouts.app')

@section('content')

    <div style="text-align: center; margin-top: 100px;">
        <a href="{{route("posts.index")}}">Posts</a>
        <a href="{{route("categories.index")}}">Categories</a>
    </div>
@stop