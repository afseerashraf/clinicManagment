@extends('layout.layout')

@section('title', 'Doctor Login')

@section('content')
<link rel="stylesheet" href="{{ asset('doctor/css/login.css') }}">

<div class="container">
    <h3>Doctor Login Form</h3>
    <a href="{{ route('doctor.index') }}">Don't have an account? Register here</a>

    <form action="{{ route('doctor.doLogin') }}" method="post">
        @csrf
        
        <div class="form-group">
            <label for="name">Email</label>
            <input type="email" class="form-control" name="email" placeholder="email" value="{{ old('email') }}">
            @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="email">Password</label>
            <input type="password" class="form-control" name="password" placeholder="password" value="{{ old('password') }}">
            @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn">Login</button>
    </form>
</div>

@endsection
