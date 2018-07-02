@extends('layouts/app')

@section('content')

    <h1 style="text-align: center">{{$Post->title}}</h1>

    <p style="margin:auto;  width: 500px;">{{$Post->content}}</p>

    <p style="margin:auto;  width: 500px;">
        <a href="{{route('posts.edit', $Post->id)}}">Modifier</a>
    </p>

    <br />
    <div style="text-align: center">
        <a href="{{route("posts.index")}}">Back</a>
    </div>

@stop