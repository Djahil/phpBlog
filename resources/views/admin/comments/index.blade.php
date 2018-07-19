@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Comments</h1>

    <table class="table table-striped" style="width: 1500px;margin: auto;">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Email</th>
            <th scope="col">Content</th>
            <th scope="col">Is Active</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <th scope="row">{{ $comment->post->id }}</th>
                <td>{{ $comment->post->title }}</td>
                <td>{{ $comment->author }}</td>
                <td>{{ $comment->email }}</td>
                <td>{{ $comment->content }}</td>
                <td>
                    @if($comment->is_active == 1)
                        yes
                    @else
                        no
                    @endif
                </td>
                <td>
                    <a href="{{route("comments.show", $comment->id)}}" style="margin: 0 10px;">
                        <button type="button" class="btn btn-primary">Show</button>
                    </a>
                    <a href="{{route("comments.edit", $comment->id)}}" style="margin: 0 10px;">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                </td>

        @endforeach
        </tbody>
    </table>

    <div style="text-align: center; margin-top: 100px;">
        <a href="{{route("admin.dashboard")}}">
            <button type="button" class="btn btn-secondary btn-lg">Back</button>
        </a>
    </div>

@stop