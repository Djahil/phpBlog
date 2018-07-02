@extends('layouts/app')

@section('content')

    <h1 style="text-align: center">{{$Post->title}}</h1>

    <p style="margin:auto;  width: 500px;">{{$Post->content}}</p>

    <br />
    <div style="text-align: center">
        <a href="{{route("guest.index")}}">Back</a>
    </div>

    <br /><br />

    <button id="commentButton">Add a comment</button>

    <div id="formComment" style="display: none;">
        {!! Form::open(["method" => "POST", "action" => ["CommentsController@store", $Post->id],'style'=>'display:grid; width:500px; margin:auto;']) !!}

        {!! Form::label("author", "Name") !!}
        {!! Form::text("author", null) !!}

        {!! Form::label("email", "Email") !!}
        {!! Form::text('email', null) !!}

        {!! Form::label("content", "Content") !!}
        {!! Form::textarea("content", null) !!}

        {!! Form::submit("Create")!!}

        {!! Form::close() !!}
    </div>

    <br /><br /><br />

    <div>
        <ul style="display: grid; margin:auto;  width: 500px;">
            {{-- A chaque tour de boucle, tu vas créer un élement LI avec le titre du post et
            un lien qui redirige vers la page show de ce post --}}
            @foreach($Comments as $comment)
                <li>
                    <div>
                        <p>{{$comment->author}}</p>
                        <p>{{$comment->email}}</p><br />
                        <p>{{$comment->content}}</p><br />
                        <br />
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

@stop

@section('script')

    <script type="text/javascript">

        let button = document.querySelector("#commentButton");
        let form = document.querySelector("#formComment");

        button.addEventListener("click", function() {
            form.style.display = "block";
            button.style.display = "none";
        })




    </script>

@stop