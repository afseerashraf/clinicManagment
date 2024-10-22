@extends('layout.layout')

@section('title', 'Doctor Register')

@section('content')

<style>
    body {
        background-color: #e3f2fd;
    }

    .container {
        margin-top: 50px;
        max-width: 600px;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    h3 {
        text-align: center;
        color: #0d6efd;
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        margin-top: 10px;
        color: #333;
    }

    input[type="text"], 
    input[type="email"], 
    input[type="password"], 
    input[type="file"] {
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
    <h3>Doctor Registration Form</h3>
    <a href="{{ route('showDoctor.login') }}">Already have an account? Login here</a>

    <form action="{{ route('doctor.register') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ old('name') }}">
            @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
            @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{ old('phone') }}">
            @error('phone') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="specialized">Specialization</label>
            <input type="text" class="form-control" name="specialized" placeholder="Your Specialization" value="{{ old('specialized') }}">
            @error('specialized') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
            @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="image">Profile Picture</label>
            <input type="file" class="form-control" name="image">
        </div>

        <button type="submit" class="btn">Register</button>
    </form>
</div>

@endsection
