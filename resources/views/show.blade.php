@extends('layouts/app')

@section('content')

    @if(isset($Post->photos()->first()->file))
        <div style="width: 100%;height: 500px; background-image: url('{{  $Post->photos()->first()->file  }}'); background-size: cover;"></div>
    @endif
    <div style="padding: 20px;">
        <h1 style="text-align:center; margin-bottom: 20px;">{{$Post->title}}</h1>

        <h3 style="text-align:center; font-style: italic">Catégorie : {{$Post->category->name}}</h3>

        <p style="margin:auto;  width: 900px; font-size: 16px">{{$Post->content}}</p>

        <br />

        <div style="text-align: center">
            <button id="commentButton" class="btn btn-success btn-lg">Add a comment</button>
            <a href="{{route("index")}}">
                <button type="button" class="btn btn-primary btn-lg">Back</button>
            </a>
        </div>

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

        <div style="display: grid; margin:auto;  width: 800px; margin-top: 20px">
            {{-- A chaque tour de boucle, tu vas créer un élement LI avec le titre du post et
                un lien qui redirige vers la page show de ce post --}}
            @foreach($Comments as $comment)
                <div style="padding: 20px; background-color: #e2e2e2; border-radius: 10px;">
                    <div style="display: flex;">
                        <p style="font-size: large; font-weight: bold; margin-right: 5px; border-radius: 50%;width: 60px; text-align: center; padding-top: 14px; background-color: @php $color = ['Aquamarine', 'BurlyWood', 'CadetBlue', 'Coral', 'HotPink']; echo $color[rand(0, 4)]; @endphp;">@php echo substr($comment->author, 0, 1) @endphp</p>
                        <p style="font-size: large; font-weight: bold; padding: 15px;">{{$comment->author}}</p>
                        <p style="font-size: small; margin-top: 20px;">Posté le {{$comment->created_at}}</p>
                    </div>
                    <p>{{$comment->content}}</p>
                </div>
            @endforeach
        </div>
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