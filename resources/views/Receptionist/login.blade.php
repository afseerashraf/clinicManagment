@extends('layout.layout')
@section('title') Receptionist Login @endsection

<style>
    * {
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
    }

    body {
        background-color: #f4f7f6;
    }

    .container {
        padding: 30px;
        margin: 100px auto;
        background-color: #ffffff;
        width: 400px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        text-align: center;
    }

    h3 {
        color: #333;
        margin-bottom: 20px;
        font-size: 24px;
    }

    input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        margin-bottom: 15px;
        font-size: 16px;
    }

    .btn {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        transition: 0.3s;
    }

    .btn:hover {
        background: linear-gradient(135deg, #2575fc, #6a11cb);
    }

    .alert {
        color: red;
        font-size: 14px;
        margin-bottom: 10px;
    }

    a {
        display: block;
        margin-top: 15px;
        color: #2575fc;
        text-decoration: none;
        font-weight: 500;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

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
