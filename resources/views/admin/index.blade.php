@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Posts</h1>

    <ul style="display: grid; margin:auto;  width: 500px;">
            {{-- A chaque tour de boucle, tu vas créer un élement LI avec le titre du post et
            un lien qui redirige vers la page show de ce post --}}
            @foreach($posts as $post)
                <li><a href ="{{route("posts.show", $post->id)}}">{{$post->title}}</a></li>
            @endforeach
    </ul>

    <div style="text-align: center; margin-top: 100px">
        <a href="{{route("comments.index")}}">Moderate Comments</a>
    </div>

@stop