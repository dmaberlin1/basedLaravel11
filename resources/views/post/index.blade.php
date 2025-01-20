@extends('layouts.default')

@section('title', $title)

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        @foreach($posts as $post)
            <h3>{{$post->title}}</h3>
            @foreach($post->comments as $comment)
                <div>{{$comment->content}}</div>
                <p>{{$comment->post->title}}</p>
            @endforeach
        @endforeach
    </div>
@endsection
