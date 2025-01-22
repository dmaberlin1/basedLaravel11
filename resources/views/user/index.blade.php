@extends('layouts.default')

@section('title', 'Register page')

@section('content')
    <div class="container">
     @foreach($users as $user)
         <div class="mb-2">
             @if($user->avatar)
                 <img width="50" src="{{asset("uploads/$user->avatar")}}" alt=''>
             @else
                 <img width="50" src="{{asset("no-avatar.jpg")}}" alt=''>

             @endif
         </div>
     @endforeach

    </div>
@endsection
