@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Categories</h1>

    <table class="table table-striped" style="width: 1500px;margin: auto;">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

            {{-- A chaque tour de boucle, tu vas créer un élement LI avec le titre du post et
            un lien qui redirige vers la page show de ce post --}}
            @foreach($Categories as $category)
                <tr>
                    <th scope="row">{{ $category->name }}</th>
                    <td>{{ $category->updated_at }}</td>
                    <td style="display: flex;" class="action">

                        <a href="{{route("categories.edit", $category->id)}}" style="margin: 0 10px;">
                            <button type="button" class="btn btn-primary">Edit</button>
                        </a>
                        {!! Form::open(["method" => "DELETE", "action" => ["AdminCategoriesController@destroy", $category->id], 'style'=>'margin: 0 10px;']) !!}

                        {!! Form::submit("Delete", ["class" => "btn btn-danger"]) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div style="text-align: center; margin-top: 100px;">

        <a href="{{route("categories.create")}}">
            <button type="button" class="btn btn-primary btn-lg">Create</button>
        </a>
        <a href="{{route("admin.dashboard")}}">
            <button type="button" class="btn btn-secondary btn-lg">Back</button>
        </a>
    </div>

@stop