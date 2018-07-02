@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Posts</h1>

    {{--<ul style="display: grid; margin:auto;  width: 500px;">--}}
        {{-- A chaque tour de boucle, tu vas créer un élement LI avec le titre du post et--}}
        {{--un lien qui redirige vers la page show de ce post --}}
        {{--@foreach($Posts as $post)--}}
            {{--<li><a href ="{{route("posts.show", $post->id)}}">{{$post->title}}</a></li>--}}
        {{--@endforeach--}}
    {{--</ul>--}}

    <table class="table table-striped" style="width: 1500px;margin: auto;">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Category</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($Posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->category_id }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <td style="display: flex;" class="action">
                    <a href="{{route("posts.show", $post->id)}}" style="margin: 0 10px;">
                        <button type="button" class="btn btn-info">Show</button>
                    </a>
                    <a href="{{route("posts.edit", $post->id)}}" style="margin: 0 10px;">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    {!! Form::open(["method" => "DELETE", "action" => ["AdminPostsController@destroy", $post->id], 'style'=>'margin: 0 10px;']) !!}

                        {!! Form::submit("Delete", ["class" => "btn btn-danger"]) !!}

                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div style="text-align: center; margin-top: 100px;">

        <a href="{{route("posts.create")}}">
            <button type="button" class="btn btn-success">Create</button>
        </a>
        <a href="{{route("admin.dashboard")}}">Back</a>
    </div>

    {{--@include('flash-message')--}}


    {{--@yield('content')--}}

@stop