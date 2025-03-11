@extends('layout.layout')

@section('title', 'Doctor Register')

@section('content')
<link rel="stylesheet" href="{{ asset('doctor/css/register.css') }}">


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
