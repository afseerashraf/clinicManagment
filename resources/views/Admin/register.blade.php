@extends('layout.layout')

@section('title', 'Admin Register')
<link rel="stylesheet" href="{{ asset('admin/css/register.css') }}">

@section('content')
<div class="form-wrapper">
    <div class="register-box">
        <h2>Admin Register</h2>
        <p class="login-link">
            Already have an account?
            <a href="{{ route('showAdmin.login') }}">Login here</a>
        </p>

        <form action="{{ route('admin.register') }}" method="POST">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" placeholder="Enter your full name" value="{{ old('name') }}">
                @error('name') <p class="error">{{ $message }}</p> @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                @error('email') <p class="error">{{ $message }}</p> @enderror
            </div>

            <!-- Phone -->
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" placeholder="Enter your phone number" value="{{ old('phone') }}">
                @error('phone') <p class="error">{{ $message }}</p> @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Create a password">
                @error('password') <p class="error">{{ $message }}</p> @enderror
            </div>

            <!-- Submit -->
            <div class="form-group">
                <button type="submit" class="btn-submit">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection
