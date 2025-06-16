@extends('layout.layout')

@section('title', 'Admin Login')
<link rel="stylesheet" href="{{ asset('admin/css/login.css') }}">
@section('content')


<div class="container">
    <div class="login-container">
        <h3>Admin Login Form</h3>
        @if (Session::has('message'))

        <div class="alert alert-success" role="alert">

            {{ Session::get('message') }}

        </div>

        @endif
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

            <div class="div">
                <a href="{{ url('admin/auth/redirect') }}">Login with Github</a>
            </div>
        </form>
    </div>
</div>

@endsection