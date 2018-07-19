@extends('layouts.app')

@section('content')
    <h1 style="text-align: center">Users</h1>


    <table class="table table-striped" style="width: 1500px;margin: auto;">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Is_active</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>@foreach ($user->roles as $role)

                        {{$role->name . " "}}

                    @endforeach</td>
                <td>{{ $user->is_active }}</td>
                <td>{{ $user->updated_at }}</td>
                <td style="display: flex;" class="action">
                    <a href="{{route("users.edit", $user->id)}}" style="margin: 0 10px;">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    {!! Form::open(["method" => "DELETE", "action" => ["AdminUsersController@destroy", $user->id], 'style'=>'margin: 0 10px;']) !!}

                    {!! Form::submit("Delete", ["class" => "btn btn-danger"]) !!}

                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div style="text-align: center; margin-top: 100px;">
        <a href="{{route("admin.dashboard")}}">Back</a>
    </div>
@stop