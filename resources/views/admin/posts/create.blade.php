@extends('layouts/app')

    @section('content')

    <h1 style="text-align: center">Create Post</h1>

    {!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store', 'files' => true, 'style'=>'display:grid; width:500px; margin:auto;']) !!}

        {!! Form::label("title", "Title") !!}
        {!! Form::text("title", null) !!}

        {!! Form::label("content", "Content") !!}
        {!! Form::textarea("content", null) !!}

        {!! Form::label("categories", "Categories") !!}
        {!! Form::select('Categories', $Categories) !!}

        {!! Form::label("images", "Image d'en-tête") !!}
        {!! Form::file('image') !!}

        <br />

        {!! Form::submit("Create Post") !!}

    {!! Form::close() !!}

    @include('includes.errors')

    <br />
    <div style="text-align: center">
        <a href="{{route("posts.index")}}">
            <button type="button" class="btn btn-secondary btn-lg">Back</button>
        </a>
    </div>

@stop