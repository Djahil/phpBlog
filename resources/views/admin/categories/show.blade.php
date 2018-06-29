@extends('layouts/app')

@section('content')

    <h1 style="text-align: center">{{$Category->title}}</h1>

    <p style="margin:auto;  width: 500px;">{{$Category->content}}</p>

    <p style="margin:auto;  width: 500px;">
        <a href="{{route('categories.edit', $Category->id)}}">Modifier</a>
    </p>

@stop