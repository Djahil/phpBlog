@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Categories</h1>

    <table class="table table-striped" style="width: 1500px;margin: auto;">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        <ul style="display: grid; margin:auto;  width: 500px;">
            {{-- A chaque tour de boucle, tu vas créer un élement LI avec le titre du post et
            un lien qui redirige vers la page show de ce post --}}
            @foreach($Categories as $category)
                <a href="{{route("categories.edit", $category->id)}}"><li>{{$category->name}}</li></a>

            @endforeach
        </ul>

        </tbody>

    <div style="text-align: center; margin-top: 100px;">
        <a href="{{route("categories.create")}}">Create</a>
        <a href="{{route("admin.dashboard")}}">Back</a>
    </div>

@stop