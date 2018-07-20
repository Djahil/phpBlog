@extends('layouts/app')

@section('content')

    <h1 style="text-align: center">Create Category</h1>

    {!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store', 'style'=>'display:grid; width:500px; margin:auto;']) !!}

    {!! Form::label("name", "Name") !!}
    {!! Form::text("name", null) !!}

    {!! Form::label("images", "Images") !!}
    {!! Form::file('images') !!}

    <br />

    {!! Form::submit("Create Category") !!}

    {!! Form::close() !!}

    @include('includes.errors')

    <br />
    <div style="text-align: center">
        <a href="{{route("categories.index")}}">
            <button type="button" class="btn btn-secondary btn-lg">Back</button>
        </a>
    </div>

@stop
