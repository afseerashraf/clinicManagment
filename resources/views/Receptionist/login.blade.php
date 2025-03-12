@extends('layout.layout')
@section('title') Receptionist Login @endsection

<link rel="stylesheet" href="{{ asset('receptionist/css/login.css') }}">

@section('content')
<div class="container">
    <h3>Receptionist Login</h3>
    <a href="{{ route('receptionist.index') }}">Don't have an account? Register</a>
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <form action="{{ route('receptionist.dologin') }}" method="post">
        @csrf
        <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
        @error('email') <div class="alert">{{ $message }}</div> @enderror

        <input type="password" name="password" placeholder="Enter your password">
        @error('password') <div class="alert">{{ $message }}</div> @enderror

        <input type="submit" class="btn" value="Login">
    </form>
    <a href="{{ route('receptionist.sendMail') }}">Forgot Password?</a>
</div>
@endsection
