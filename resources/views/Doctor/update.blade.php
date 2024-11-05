@extends('layout.layout')

@section('title', 'Doctor update')

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
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);
    }

    h3 {
        text-align: center;
        color: #0d6efd;
        margin-bottom: 30px;
        font-weight: bold;
    }

    label {
        font-weight: 500;
        color: #333;
        margin-top: 10px;
        display: block;
    }

    .input-group {
        position: relative;
    }

    .input-group i {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: #6c757d;
    }

    .form-control {
        width: 100%;
        padding: 12px 10px 12px 40px;
        margin-top: 5px;
        margin-bottom: 20px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        font-size: 14px;
    }

    .btn {
        width: 100%;
        padding: 12px;
        background-color: #0d6efd;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        transition: 0.3s;
    }

    .btn:hover {
        background-color: #0b5ed7;
    }

    a {
        display: block;
        text-align: center;
        margin-top: 15px;
        color: #0d6efd;
        text-decoration: none;
        font-size: 14px;
    }

    a:hover {
        color: #0b5ed7;
        text-decoration: underline;
    }

    .alert {
        margin-top: 5px;
        padding: 10px;
        font-size: 13px;
        color: #d9534f;
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
    }
</style>

<div class="container">

    <form action="{{ route('update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ encrypt($doctor->id) }}" name="id"><br>
        <div class="form-group">
            <label for="name">Name</label>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ $doctor->name }}">
            </div>
            @error('name') <div class="alert">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $doctor->email }}">
            </div>
            @error('email') <div class="alert">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <div class="input-group">
                <i class="fas fa-phone"></i>
                <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{ $doctor->phone }}">
            </div>
            @error('phone') <div class="alert">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="specialized">Specialization</label>
            <div class="input-group">
                <i class="fas fa-stethoscope"></i>
                <input type="text" class="form-control" name="specialized" placeholder="Specialization" value="{{ $doctor->specialized }}">
            </div>
            @error('specialized') <div class="alert">{{ $message }}</div> @enderror
        </div>


        <div class="form-group">
            <label for="image">Profile Picture</label>

            <!-- Show current image if it exists -->
            @if($doctor->image)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $doctor->image) }}" alt="Profile Picture" style="width: 100px; height: 100px; border-radius: 50%;">
                </div>
            @endif

            <input type="file" class="form-control" name="image">
            @error('image') <div class="alert">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn">Update</button>
    </form>
</div>

@endsection
