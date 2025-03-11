@extends('layout.layout')

@section('title', 'reset password')
<link rel="stylesheet" href="{{ asset('admin/css/resetPassword.css') }}">
@section('content')
   
    <div class="container">
        <h3>Reset Password</h3>
        <form action="{{ route('resetedPassword') }}" method="post">
            @csrf
            <input type="hidden" name="admin_id" value="{{encrypt($admin->id)}}">
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Enter password" required>
            @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror
            
            <label for="password">Confirm Passwod</label>
            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Enter password" required>
            @error('confirmPassword') <div class="alert alert-danger">{{ $message }}</div> @enderror
            <button type="submit" class="btn btn-outline-primary mt-3">Reset</button>


        </form>
    </div>

@endsection
