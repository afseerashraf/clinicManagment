@extends('layout.layout')

@section('title', 'Admin Register')
<link rel="stylesheet" href="{{ asset('admin/css/register.css') }}">
@section('content')

<div class="container">
    <div class="register-container">
        <h3>Admin Register Form</h3>
        <a href="{{ route('showAdmin.login') }}">Already have an account?</a>

        <form action="{{ route('admin.register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                @error('phone') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
                @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-outline-primary">Register</button>
            </div>
        </form>
    </div>
</div>

@endsection
