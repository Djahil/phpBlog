@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Edit Category</h1>

    {!! Form::model($Category, ["method" => "PATCH", "action" => ["AdminCategoriesController@update", $Category->id],'style'=>'display:grid; width:500px; margin:auto;']) !!}

        {!! Form::label("name", "Name") !!}
        {!! Form::text("name", null) !!}

        {!! Form::label("images", "Images") !!}
        {!! Form::file('photo') !!}

        {!! Form::submit("Update")!!}

    {!! Form::close() !!}


    {!! Form::open(["method" => "DELETE", "action" => ["AdminCategoriesController@destroy", $Category->id], 'style'=>'display:grid; width:500px; margin:auto;']) !!}

        {!! Form::submit("Delete") !!}

    {!! Form::close() !!}

@stop