@extends('layouts.default')

@section('content')

    <div class="container">
        <h1>Register</h1>
        {{$name}}


    </div>
  <div class="container mt-5" >  <p>Now: {{date('Y-m-d/m/y H:i:s')}}</p>
  </div>
@endsection

@section('title')
    register
@endsection
