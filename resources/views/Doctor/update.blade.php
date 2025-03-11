@extends('layout.layout')

@section('title', 'Doctor update')

@section('content')
<link rel="stylesheet" herf="{{ asset('doctor/css/update.css') }}">

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
