@extends('layout.layout')
@section('title')Receptionist Register @endsection
<style>
    * {
        padding-left: 12px;
    }

    .container {
        padding: 20px;
        margin: 150px auto;
        font-style: oblique;
        background-color: #f2e7e5;
        width: 300px; /* Reduced width */
        box-shadow: 1px 1px 1px 1px;
        border-radius: 8px;
    }

    input {
        width: 100%; /* Full width of container */
        margin-bottom: 10px;
        padding: 8px; /* Added padding for better touch targets */
    }

    .btn {
        width: 100%;
        padding: 10px; /* Increased padding for button */
    }

    h3 {
        text-align: center;
        margin-bottom: 15px; /* Added margin for spacing */
    }

    .alert {
        color: red;
        margin-bottom: 10px;
    }

    a {
        display: block; /* Make the link block level */
        text-align: center; /* Center the link */
        margin-top: 10px; /* Added margin for spacing */
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
        
        <input type="submit" class="btn btn-outline-primary" value="Register">
    </form>
</div>
@endsection
