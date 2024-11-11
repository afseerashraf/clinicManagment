@extends('layout.layout')

@section('title', 'Admin Login')

@section('content')

<style>
    .login-container {
        padding-top: 50px;
        background-color: #f2e7e5;
        box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
    }

    .login-container h3 {
        text-align: center;
        margin-bottom: 20px;
    }

    .login-container form {
        padding: 20px;
    }

    .login-container a {
        display: block;
        margin-bottom: 15px;
        text-align: center;
    }
</style>

<div class="container">
    <div class="login-container">
        <h3>Admin Login Form</h3>
        <a href="{{ route('showAdmin.register') }}">No account? Register here</a>

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
                @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
            <a href="{{ route('viewsendEmail') }}" class="btn btn-link mt-2">Forgot Password?</a>

            <div class="d-grid">
                <button type="submit" class="btn btn-outline-primary">Login</button>
            </div>
        </form>
    </div>
</div>

@endsection
