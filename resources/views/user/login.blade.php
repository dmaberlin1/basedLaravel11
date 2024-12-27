@extends('layouts.default')

@section('content')

    <div class="container">
        <h1>Login</h1>
       users count: {{$users_count}}
    </div>
@endsection


@section('title','login page')

{{--@push('header_scripts')--}}
{{--<script src="{{asset('assets/js/test.js')}}"></script>--}}
{{--@endpush--}}
