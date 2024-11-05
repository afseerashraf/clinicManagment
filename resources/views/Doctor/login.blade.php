@extends('layout.layout')

@section('title', 'Doctor Login')

@section('content')

<style>
    body {
        background-color: #e3f2fd;
    }

    .container {
        margin-top: 100px;
        max-width: 400px;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        margin-left: auto;
        margin-right: auto;
    }

    h3 {
        text-align: center;
        color: #0d6efd;
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        color: #333;
    }

    input[type="email"], 
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ced4da;
        border-radius: 5px;
    }

    .btn {
        width: 100%;
        padding: 10px;
        background-color: #0d6efd;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
    }

    .btn:hover {
        background-color: #0b5ed7;
    }

    a {
        display: block;
        text-align: center;
        margin-top: 15px;
        color: #0d6efd;
    }

    .alert {
        margin-top: 10px;
        padding: 8px;
        font-size: 14px;
    }
</style>

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
