@extends('layouts/app')

@section('content')

    <h1 style="text-align: center">Content</h1>

    {!! Form::model($Comment, ["method" => "PATCH", "action" => ["AdminCommentsController@show", $Comment->id],'style'=>'display:grid; width:500px; margin:auto;']) !!}

    {!! Form::textarea("content", null) !!}

    {!! Form::close() !!}

    <div style="text-align: center">
        <a href="{{route("comments.index")}}">
            <button type="button" class="btn btn-secondary btn-lg">Back</button>
        </a>
    </div>

@stop