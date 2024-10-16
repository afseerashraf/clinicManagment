@extends('layout.layout')
@section('title')Receptionist Register @endsection
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
            height: 412px;
            box-shadow: 1px 1px 1px 1px;

        }

        input {
            width: 400px;
        }
    </style>
@section('content')

<div class="continer">
        <h3>Receptionist Register Form</h3>
        <a href="{{ route('showReceptionist.login') }}">already have an account</a>
        <form action="{{ route('receptionist.register') }}" method="post">
           @csrf
            <labl for="name">Name</labl><br>
            <input type="text" class="form-controller" name="name" placeholder="Name"><br>
            @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
           
            <label for="email">email</label><br>
            <input type="email" class="form-controller" name="email" placeholder="email"><br>
            @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
            
            <label for="phone">Place</label>
            <input type="text" class="form-controller" name="place" placeholder="place"><br><br>
            @error('place') <div class="alert">{{ $message }}</div> @enderror
           
            <label for="phone">Phone</label>
            <input type="text" class="form-controller" name="phone" placeholder="phone"><br><br>
            @error('phone') <div class="alert">{{ $message }}</div> @enderror

            <label for="password">Password</label><br>
            <input type="password" class="form-controller" name="password" placeholder="password"><br><br>
            @error('password') <div class="alert alert-danger">{{ $message }}</div>@enderror
            <input type="submit" class="btn btn-outline-primary" value="register">
        </form>
    </div>
@endsection