@extends('layout.layout')

@section('title') Receptionist Register @endsection

<style>
    /* Global Styles */
    * {
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
    }

    body {
        background: linear-gradient(to right, #ff9966, #ff5e62);
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    /* Form Container */
    .container {
        background: #fff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        width: 400px;
        text-align: center;
        animation: fadeIn 0.8s ease-in-out;
    }

    /* Title */
    h3 {
        margin-bottom: 10px;
        color: #333;
        font-size: 24px;
        font-weight: bold;
    }

    p {
        color: #666;
        font-size: 14px;
        margin-bottom: 20px;
    }

    /* Input Fields */
    .form-controller {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        margin-bottom: 15px;
        transition: all 0.3s ease;
    }

    .form-controller:focus {
        border-color: #ff5e62;
        outline: none;
        box-shadow: 0 0 10px rgba(255, 94, 98, 0.3);
    }

    /* Error Message */
    .alert {
        color: red;
        font-size: 14px;
        margin-bottom: 10px;
        text-align: left;
    }

    /* Submit Button */
    .btn {
        width: 100%;
        padding: 12px;
        background: linear-gradient(to right, #ff5e62, #ff9966);
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .btn:hover {
        background: linear-gradient(to right, #ff9966, #ff5e62);
        box-shadow: 0 5px 15px rgba(255, 94, 98, 0.3);
    }

    /* Link */
    a {
        display: block;
        margin-top: 15px;
        color: #ff5e62;
        font-size: 14px;
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }

    /* Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

@section('content')
<div class="container">
    <h3>Register as Receptionist</h3>
    <p>Fill in the details below to create your account.</p>

    <a href="{{ route('showReceptionist.login') }}">Already have an account? Login</a>

    <form action="{{ route('receptionist.register') }}" method="post">
        @csrf

        <input type="text" class="form-controller" name="name" placeholder="Full Name">
        @error('name') <div class="alert">{{ $message }}</div> @enderror

        <input type="email" class="form-controller" name="email" placeholder="Email Address">
        @error('email') <div class="alert">{{ $message }}</div> @enderror

        <input type="text" class="form-controller" name="place" placeholder="Place">
        @error('place') <div class="alert">{{ $message }}</div> @enderror

        <input type="text" class="form-controller" name="phone" placeholder="Phone Number">
        @error('phone') <div class="alert">{{ $message }}</div> @enderror

        <input type="password" class="form-controller" name="password" placeholder="Create Password">
        @error('password') <div class="alert">{{ $message }}</div> @enderror

        <input type="submit" class="btn" value="Register">
    </form>
</div>
@endsection
