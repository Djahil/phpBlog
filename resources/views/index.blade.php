@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Bienvenue sur CineFiles !</h1>

    <br />

    <div style="display: flex; flex-wrap: wrap; justify-content: space-around; margin:auto;  width: 80%;">
        {{-- A chaque tour de boucle, tu vas créer un élement LI avec le titre du post et
        un lien qui redirige vers la page show de ce post --}}
        @foreach($posts as $post)
            <div style="width: 400px; margin-bottom: 20px; margin-top: 20px; box-shadow: 0px 0px 30px -1px rgba(0,0,0,0.53); cursor: pointer;" onclick="window.location='{{route("show", $post->id)}}'">
                <div style="width: 100%; height: 150px;background-image: url('{{ $post->photos()->first() ? $post->photos()->first()->file : 'http://seriousmovies.com/wp-content/uploads/2014/02/salle-cinema-francais.jpg' }}'); background-size: cover;"></div>

                <div style="padding: 20px;">
                    <h1 style="margin: 0;">
                        {{$post->title}}
                    </h1>
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
                </div>
            </div>
        @endforeach
    </div>

@stop