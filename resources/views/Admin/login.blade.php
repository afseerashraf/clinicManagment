@extends('layout.layout')
@section('title')Admin Login @endsection
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
        <h3>Admin Login Form</h3>
       <a href="{{ route('showAdmin.register') }}">no have account</a>
        <form action="{{ route('admin.login') }}" method="post">
           @csrf
           
            <label for="email">email</label><br>
            <input type="email" class="form-controller" name="email" placeholder="email"><br>
            @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
          
            <label for="password">Password</label><br>
            <input type="password" class="form-controller" name="password" placeholder="password"><br><br>
            @error('password') <div class="alert alert-danger">{{ $message }}</div>@enderror
            <input type="submit" class="btn btn-outline-primary" value="Login">
        </form>
    </div>
@endsection