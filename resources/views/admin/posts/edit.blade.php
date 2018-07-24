@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Edit Post</h1>

    {!! Form::model($Post, ["method" => "PATCH", "action" => ["AdminPostsController@update", $Post->id], "files" => true, 'style'=>'display:grid; width:500px; margin:auto;']) !!}

        {!! Form::label("title", "Title") !!}
        {!! Form::text("title", null) !!}

        {!! Form::label("content", "Content") !!}
        {!! Form::textarea("content", null) !!}

        {!! Form::label("images", "Images") !!}
        {!! Form::file('image') !!}

        {!! Form::label("category_id", "Categories") !!}
        {!! Form::select('category_id', $Categories) !!}

    <div style="text-align: center; margin-top: 10px;">
        {!! Form::submit("Update", ['class' => 'btn btn-primary btn-lg'])!!}

    {!! Form::close() !!}

        <a href="{{route("posts.index")}}">
            <button type="button" class="btn btn-secondary btn-lg">Back</button>
        </a>
    </div>

@stop
