@extends('layouts/app')

@section('content')

    <h1 style="text-align: center">Content</h1>

    {!! Form::model($Comment, ["method" => "PATCH", "action" => ["AdminCommentsController@show", $Comment->id],'style'=>'display:grid; width:500px; margin:auto;']) !!}

    {!! Form::textarea("content", null) !!}

    {!! Form::close() !!}

    <div style="text-align: center">
        <a href="{{route("comments.index")}}">Back</a>
    </div>

@stop