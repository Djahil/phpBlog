@extends('layouts/app')

@section('content')

{{--    <div style="display: flex; flex-wrap: wrap; justify-content: space-around; margin:auto;  width: 80%;">
        <div style="width: 800px; margin-bottom: 20px; margin-top: 20px; box-shadow: 0px 0px 30px -1px rgba(0,0,0,0.53); ">
            <div style="width: 100%; height: 150px; background-size: cover;"></div>--}}
            @if(isset($Post->photos()->first()->file))
                <div style="width: 100%;height: 500px; background-image: url('{{  $Post->photos()->first()->file  }}'); background-size: cover;"></div>
            @endif
            <div style="padding: 20px;">
                <h1 style="text-align:center; margin-bottom: 20px;">
                    {{$Post->title}}
                </h1>
                <p style="margin:auto;  width: 500px;">{{$Post->content}}</p>
            </div>
            <div style="text-align: center">
                <a href="{{route("posts.index")}}" >
                    <button type="button" class="btn btn-secondary btn-lg">Back</button>
                </a>
            </div>
{{--        </div>
    </div>--}}

@stop