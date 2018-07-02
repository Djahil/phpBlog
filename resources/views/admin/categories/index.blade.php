@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Categories</h1>

    <ul style="display: grid; margin:auto;  width: 500px;">
        {{-- A chaque tour de boucle, tu vas créer un élement LI avec le titre du post et
        un lien qui redirige vers la page show de ce post --}}
        @foreach($Categories as $category)
            <a href="{{route("categories.edit", $category->id)}}"><li>{{$category->name}}</li></a>
        @endforeach
    </ul>

    <div style="text-align: center; margin-top: 100px;">
        <a href="{{route("categories.create")}}">Create</a>
        <a href="{{route("admin.dashboard")}}">Back</a>
    </div>

@stop