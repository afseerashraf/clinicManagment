@extends('layout.layout')
@section('title')Doctor Register @endsection
<style>
        * {

            padding-left: 12px;
        }

        .continer {
            padding-top: 12px;
            text-decoration: none;
            margin-top: 53px;
            margin-left: 300px;
            font-style: oblique;
            background-color: #f2e7e5;
            width: 454px;
            height: 462px;
            box-shadow: 1px 1px 1px 1px;

        }
        .btn{
            padding-top: 12px;
        }
        input {
            width: 400px;
        }
    </style>
@section('content')

<div class="continer">
        <h3>Doctor Register Form</h3>
        <a href="{{ route('showDoctor.login') }}">login</a>
        <form action="{{ route('doctor.register') }}" method="post" enctype="multipart/form-data">
           @csrf
            <label for="name">Name</label><br>
            <input type="text" class="form-controller" name="name" placeholder="Name"><br>
            @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
            <label for="email">email</label><br>
            <input type="email" class="form-controller" name="email" placeholder="email"><br>
            @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
            <label for="phone">Phone</label>
            <input type="text" class="form-controller" name="phone" placeholder="phone"><br>
            @error('phone') <div class="alert">{{ $message }}</div> @enderror
            <label for="phone">specialized</label>
            <input type="text" class="form-controller" name="specialized" placeholder="specialized"><br>
            @error('specialized') <div class="alert">{{ $message }}</div> @enderror
            <label for="password">passoword</label>
            <input type="password" class="form-controller" name="password" placeholder="password"><br><br>
            @error('password') <div class="alert">{{ $message }}</div> @enderror
            <label for="photot">Photo</label>
            <input type="file" class="form-controller" name="image"><br>
            
            <input type="submit" class="btn btn-outline-primary" value="register">
        </form>
    </div>
@endsection