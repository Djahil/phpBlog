@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Edit User</h1>

    {!! Form::model($user, ["method" => "PATCH", "action" => ["AdminUsersController@update", $user->id],'style'=>'display:grid; width:500px; margin:auto;']) !!}

    {!! Form::label("name", "Name") !!}
    {!! Form::text("name", $user->name) !!}

    {!! Form::label("email", "Email") !!}
    {!! Form::email("email", $user->email) !!}

    {!! Form::label("role", "Role") !!}


    <div>
        {!! Form::checkbox('role[]', '1', $admin) !!}
        {!! Form::label("role", "Administrator") !!}
    </div>
    <div>
        {!! Form::checkbox('role[]', '2', $author) !!}
        {!! Form::label("role", "Author") !!}
    </div>
    <div>
        {!! Form::checkbox('role[]', '3', $moderator) !!}
        {!! Form::label("role", "Moderator") !!}
    </div>

    {{--{!! Form::submit("Update")!!}--}}
    {!! Form::submit("Update", ["class" => "btn btn-success btn-lg", 'style'=>'width:100px; margin:auto; font-size:18px;']) !!}

    {!! Form::close() !!}

    <div style="text-align: center; margin-top: 10px;">
        <a href="{{route("users.index", $user->id)}}">
            <button type="button" class="btn btn-secondary btn-lg" style="width: 100px;">Back</button>
        </a>
    </div>

@stop