@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Bienvenue sur mon Blog !</h1>

    <br />

    <ul style="display: grid; margin:auto;  width: 500px;">
        {{-- A chaque tour de boucle, tu vas créer un élement LI avec le titre du post et
        un lien qui redirige vers la page show de ce post --}}
        @foreach($posts as $post)
            <li>
                <a href ="{{route("show", $post->id)}}">{{$post->title}}</a>
                <p>
                @if(strlen($post->content)>=50)
                    <?php
                        $post = substr($post->content,0,50) . "..." ;
                        echo $post;
                    ?>
                @else
                    {{$post->content}}
                @endif
                </p>
            </li>
        @endforeach
    </ul>

@stop