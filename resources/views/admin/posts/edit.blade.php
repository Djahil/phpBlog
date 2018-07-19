@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Edit Post</h1>

    {!! Form::model($Post, ["method" => "PATCH", "action" => ["AdminPostsController@update", $Post->id],'style'=>'display:grid; width:500px; margin:auto;']) !!}

        {!! Form::label("title", "Title") !!}
        {!! Form::text("title", null) !!}

        {!! Form::label("content", "Content") !!}
        {!! Form::textarea("content", null) !!}

        {!! Form::label("images", "Images") !!}
        {!! Form::file('images') !!}

        {!! Form::label("categories", "Categories") !!}
        {!! Form::select('Categories', $Categories) !!}

        {!! Form::submit("Update")!!}

    {!! Form::close() !!}

    <br />
    <div style="text-align: center">
        <a href="{{route("posts.show", $Post->id)}}">Back</a>
    </div>

@stop
