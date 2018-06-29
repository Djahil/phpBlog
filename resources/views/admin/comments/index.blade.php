@extends('layouts.app')

@section('content')

    <ul>

        @foreach($comments as $comment)
            <li>
                <div>
                    <h3>{{$comment->post->title}}</h3><br />
                    <p>{{$comment->author}}</p>
                    <p>{{$comment->email}}</p><br />
                    <p>{{$comment->content}}</p><br />
                    <p>is_active :
                        @if($comment->is_active == 1)
                            yes
                        @else
                            no
                        @endif
                    </p><br /><br />
                    <a href="{{route("comments.edit", $comment->id)}}">Modify Comment</a>
                </div>
            </li>

        @endforeach

    </ul>




@stop