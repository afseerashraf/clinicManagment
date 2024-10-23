@extends('layout.layout')
@section('title')Receptionist Register @endsection

<style>
    * {
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    .container {
        padding: 20px;
        margin: 150px auto;
        background-color: #f2e7e5;
        width: 350px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
    }

    input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 15px;
    }

    .btn {
        width: 100%;
        padding: 12px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    h3 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .alert {
        color: red;
        font-size: 14px;
    }

    a {
        display: block;
        text-align: center;
        margin-top: 15px;
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

@section('content')

<div class="container">
    <h3>Receptionist Register Form</h3>
    <a href="{{ route('showReceptionist.login') }}">Already have an account?</a>
    <form action="{{ route('receptionist.register') }}" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" class="form-controller" name="name" placeholder="Name">
        @error('name') <div class="alert">{{ $message }}</div> @enderror

        <label for="email">Email</label>
        <input type="email" class="form-controller" name="email" placeholder="Email">
        @error('email') <div class="alert">{{ $message }}</div> @enderror

        <label for="place">Place</label>
        <input type="text" class="form-controller" name="place" placeholder="Place">
        @error('place') <div class="alert">{{ $message }}</div> @enderror

        <label for="phone">Phone</label>
        <input type="text" class="form-controller" name="phone" placeholder="Phone">
        @error('phone') <div class="alert">{{ $message }}</div> @enderror

        <label for="password">Password</label>
        <input type="password" class="form-controller" name="password" placeholder="Password">
        @error('password') <div class="alert">{{ $message }}</div> @enderror
        
        <input type="submit" class="btn" value="Register">
    </form>
</div>
@endsection
