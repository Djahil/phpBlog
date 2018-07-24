@extends('layouts/app')

@section('content')

    <h1 style="text-align: center">Comment on "<i>{{ $Comment->post->title }}</i>"</h1>

    <div style="padding: 20px; text-align:center; margin-bottom: 20px;">
        <h3>
            {{$Comment->author}}
        </h3>
        <h4>{{$Comment->email}}</h4>
    </div>
    <div>
        <p style="margin:auto;  width: 500px;">{{$Comment->content}}</p>
    </div>
    <div style="text-align: center; margin-top: 20px">
        <a href="{{route("comments.index")}}">
            <button type="button" class="btn btn-secondary btn-lg">Back</button>
        </a>
    </div>

@stop