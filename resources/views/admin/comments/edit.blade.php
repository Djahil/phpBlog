@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Edit Comment</h1><br /><br />

    <h4>{{$Comment->author}}</h4>
    <p>{{$Comment->email}}</p>

    {!! Form::model($Comment, ["method" => "PATCH", "action" => ["AdminCommentsController@update", $Comment->id],'style'=>'display:grid; width:500px; margin:auto;']) !!}

    {!! Form::label("content", "Content") !!}
    {!! Form::textarea("content", null) !!}

    {!! Form::label("is_active", "Is Active :") !!}
    {!! Form::select('is_active', ['1' => 'Yes', '0' => 'No'], null) !!}

    {{--{!! Form::select('Category') !!}--}}

    {!! Form::submit("Update")!!}

    {!! Form::close() !!}

    <br />
    <div style="text-align: center">
        <a href="{{route("comments.index")}}">Back</a>
    </div>



@stop