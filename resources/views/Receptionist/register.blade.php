@extends('layout.layout')

@section('title') Receptionist Register @endsection

<link rel="stylesheet" href="{{ asset('receptionist/css/register.css') }}">
@section('content')
<div class="container">
    <h3>Register as Receptionist</h3>
    <p>Fill in the details below to create your account.</p>

    <a href="{{ route('showReceptionist.login') }}">Already have an account? Login</a>

    <form action="{{ route('receptionist.register') }}" method="post">
        @csrf

        <input type="text" class="form-controller" name="name" placeholder="Full Name">
        @error('name') <div class="alert">{{ $message }}</div> @enderror

        <input type="email" class="form-controller" name="email" placeholder="Email Address">
        @error('email') <div class="alert">{{ $message }}</div> @enderror

        <input type="text" class="form-controller" name="place" placeholder="Place">
        @error('place') <div class="alert">{{ $message }}</div> @enderror

        <input type="text" class="form-controller" name="phone" placeholder="Phone Number">
        @error('phone') <div class="alert">{{ $message }}</div> @enderror

        <input type="password" class="form-controller" name="password" placeholder="Create Password">
        @error('password') <div class="alert">{{ $message }}</div> @enderror

        <input type="submit" class="btn" value="Register">
    </form>
</div>
@endsection
