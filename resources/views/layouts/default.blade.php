<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
{{--    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/libs/bootstrap/bootstrap.min.css">--}}
    <link rel="stylesheet" href={{asset('assets/libs/bootstrap/bootstrap.min.css')}}>
    <link rel="stylesheet" href={{asset('assets/libs/bootstrap/bootstrap.min.css')}}>
    @stack('header_scripts')
</head>
<body>
@include('layouts.incs.navbar')
@yield('content')

<script src={{asset('assets/libs/bootstrap/bootstrap.bundle.min.js')}}></script>
@stack('footer_scripts')
</body>
</html>
