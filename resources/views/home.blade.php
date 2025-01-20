@extends('layouts.default')

@section('title', 'Home page')

@section('content')
    <div class="container">
        <h1>Home</h1>
        @foreach($posts as $post)
            <div class="card mb-4">
                <div class="card-header">{{$post->title}}</div>
                <div class="card-body">{!! $post->content !!}</div>
                <div class="card-footer">
                    @forelse($post->categories as $category)
                       <span style="font-weight: bold"> {{$category->pivot->adminBy}}</span>
                        {{$category->title}}
                        @if(!$loop->last),@endif
                    @empty
                        <span style="color: rgba(128,128,128,0.45);">without category</span>
                    @endforelse
                </div>
            </div>
        @endforeach

{{--https://stackoverflow.com/questions/42776102/how-to-remove-query-string-page-from-the-first-page-of-laravel-pagination--}}
        {{$posts->onEachSide(2)->links('vendor.pagination.my-pagination-bootstrap-5')}}
    </div>
@endsection
