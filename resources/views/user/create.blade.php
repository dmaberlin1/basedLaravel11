@extends('layouts.default')

@section('title', 'Register page')

@section('content')
    <div class="container">
        @csrf
        <div class="col-md-6 offset-md-3">
            <h1>Register</h1>
            <form action="{{route('user.store')}}" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Name"
                    value="{{old('name')}}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="email@gmail.com"
                           value="{{old('email')}}">
                    >
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="*******">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Password Confirmation</label>
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation"
                           placeholder="*******">
                </div>

                <div class="form-check mb-3">
                    <input name="agree" class="form-check-input" type="checkbox" id="agree">
                    <label class="form-check-label" for="agree">
                        Agree
                    </label>
                </div>

                <button class="btn btn-warning" type="submit">Register</button>
            </form>

            @php
                dump(request()->old('username'));
            @endphp
        </div>

    </div>
@endsection
