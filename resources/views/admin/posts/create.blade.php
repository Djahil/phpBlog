@extends('layouts/app')

    @section('content')

    <h1 style="text-align: center">Create Post</h1>

    {!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store', 'style'=>'display:grid; width:500px; margin:auto;']) !!}

        {!! Form::label("title", "Title") !!}
        {!! Form::text("title", null) !!}

        {!! Form::label("content", "Content") !!}
        {!! Form::textarea("content", null) !!}

        {!! Form::label("categories", "Categories") !!}
        {!! Form::select('Categories', $Categories) !!}

        {!! Form::label("images", "Images") !!}
        {!! Form::file('photo') !!}

        {!! Form::submit("Create Post") !!}

    {!! Form::close() !!}

    @include('includes.errors')

    <br />
    <div style="text-align: center">
        <a href="{{route("admin.dashboard")}}">Back</a>
    </div>

@stop