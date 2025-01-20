<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/bootstrap.min.css') }}">

    @stack('header_scripts')
</head>
<body>

@include('layouts.incs.navbar', ['status' => 'complete'])

<header class="header"></header>

@yield('content')
{{--https://www.youtube.com/watch?v=HcTMy8AKxYA--}}
<script src="{{ asset('assets/libs/bootstrap/bootstrap.bundle.min.js') }}"></script>
@stack('footer_scripts')
</body>
</html>

