@extends('layout.layout')
@section('title')Admin Register @endsection
<style>
        * {

            padding-left: 12px;
        }

        .continer {
            padding-top: 12px;
            text-decoration: none;
            margin-top: 150px;
            margin-left: 300px;
            font-style: oblique;
            background-color: #f2e7e5;
            width: 454px;
            height: 325px;
            box-shadow: 1px 1px 1px 1px;

        }

        input {
            width: 400px;
        }
    </style>
@section('content')

<div class="continer">
        <h3>Register Form</h3>
        <a href="">already have an account</a>
        <form action="{{ route('admin.register') }}" method="post">
            @csrf
            <label for="name">Name</label><br>
            <input type="text" class="form-controller" name="name" placeholder="Name"><br>
            @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
            <label for="email">email</label><br>
            <input type="email" class="form-controller" name="email" placeholder="email"><br>
            @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
            <label for="phone">Phone</label>
            <input type="text" class="form-controller" name="phone" placeholder="phone"><br><br>
            <label for="password">Password</label><br>
            <input type="password" class="form-controller" name="password" placeholder="password"><br><br>
            @error('password') <div class="alert alert-danger">{{ $message }}</div>@enderror
            <input type="submit" class="btn btn-outline-primary" value="register">
        </form>
    </div>
@endsection