@extends('layouts.default')

@section('title', 'Login page')

@section('content')
    <div class="container">
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
        <h1>Login</h1>

    </div>
@endsection

@push('header_scripts')
{{--    <script src="{{ asset('assets/js/test.js') }}"></script>--}}
@endpush

@push('footer_scripts')
{{--    <script src="{{ asset('assets/js/test.js') }}"></script>--}}
@endpush
