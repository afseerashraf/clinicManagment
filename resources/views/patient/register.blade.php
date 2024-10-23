@extends('layout.layout')
@section('title')Patient Register @endsection
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .container {
        background-color: #f2f2f2;
        width: 100%;
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: white;
    }

    .container h3 {
        text-align: center;
        margin-bottom: 20px;
    }

    .container form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 5px;
    }

    input, select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .btn {
        background-color: #007bff;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .banner {
        width: 100%;
        height: 200px;
        background-image: url(''); /* Example image URL */
        background-size: cover;
        background-position: center;
        border-radius: 8px 8px 0 0;
    }

    .alert {
        color: red;
        margin-bottom: 10px;
    }
</style>

@section('content')

<div class="container">
    <div class="banner"></div>
    <h3>Patient Registration</h3>
    <form action="{{ route('patient.register') }}" method="post">
        @csrf

        <label for="date">Appointment Date</label>
        <input type="date" name="date">
        @error('date') <div class="alert">{{ $message }}</div> @enderror

        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Enter full name">
        @error('name') <div class="alert">{{ $message }}</div> @enderror

        <label for="age">Age</label>
        <input type="text" name="age" placeholder="Enter age">
        @error('age') <div class="alert">{{ $message }}</div> @enderror

        <label for="phone">Phone</label>
        <input type="text" name="phone" placeholder="Enter phone number">
        @error('phone') <div class="alert">{{ $message }}</div> @enderror

        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter email address">
        @error('email') <div class="alert">{{ $message }}</div> @enderror

        <label for="place">Place</label>
        <input type="text" name="place" placeholder="Enter place">
        @error('place') <div class="alert">{{ $message }}</div> @enderror

        <label for="house">House</label>
        <input type="text" name="house" placeholder="Enter house name">
        @error('house') <div class="alert">{{ $message }}</div> @enderror

        <label for="medicalHistory">Medical History</label>
        <input type="text" name="medicalHistory" placeholder="Enter medical history">
        @error('medicalHistory') <div class="alert">{{ $message }}</div> @enderror

        <label for="doctor">Select Doctor</label>
        <select name="doctor_id">
            <option value="">--Select Doctor--</option>
            @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}">{{ $doctor->name }} ({{ $doctor->specialized }})</option>
            @endforeach
        </select>
        @error('doctor_id') <div class="alert">{{ $message }}</div> @enderror

        <input type="submit" class="btn" value="Register">
    </form>
</div>
@endsection
