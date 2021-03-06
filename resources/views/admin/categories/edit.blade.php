@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Edit Category</h1>

    {!! Form::model($Category, ["method" => "PATCH", "action" => ["AdminCategoriesController@update", $Category->id],'style'=>'display:grid; width:500px; margin:auto;']) !!}

        {!! Form::label("name", "Name") !!}
        {!! Form::text("name", null) !!}

        {!! Form::submit("Update")!!}

    {!! Form::close() !!}

    <br />
    <div style="text-align: center">
        <a href="{{route("categories.index", $Category->id)}}">
            <button type="button" class="btn btn-secondary btn-lg">Back</button>
        </a>
    </div>

@stop
