@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Edit Post</h1>

    {!! Form::model($Post, ["method" => "PATCH", "action" => ["AdminPostsController@update", $Post->id],'style'=>'display:grid; width:500px; margin:auto;']) !!}

        {!! Form::label("title", "Title") !!}
        {!! Form::text("title", null) !!}

        {!! Form::label("content", "Content") !!}
        {!! Form::textarea("content", null) !!}

        {!! Form::label("images", "Images") !!}
        {!! Form::file('photo') !!}

        {!! Form::label("categories", "Categories") !!}
        {!! Form::select('Categories', $Categories) !!}

        {!! Form::submit("Update")!!}

    {!! Form::close() !!}

    {!! Form::open(["method" => "DELETE", "action" => ["AdminPostsController@destroy", $Post->id], 'style'=>'display:grid; width:500px; margin:auto;']) !!}

        {!! Form::submit("Delete") !!}

    {!! Form::close() !!}

@stop