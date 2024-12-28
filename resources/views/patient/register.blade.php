@extends('layout.receptionistLayout')
@section('title') Patient Register @endsection
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    .form-container {
        background-color: #fff;
        width: 50%;
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-container h3 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-container form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 5px;
        font-weight: bold;
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
        text-align: center;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .error {
        color: red;
        margin-bottom: 10px;
    }
</style>

@section('content')
<div class="form-container">
    <h3>Patient Registration</h3>
    <form action="{{ route('patient.register') }}" method="post">
        @csrf

        <label for="date">Appointment Date</label>
        <input type="date" name="date" id="date" required>
        @error('date') <div class="error">{{ $message }}</div> @enderror

        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter full name" required>
        @error('name') <div class="error">{{ $message }}</div> @enderror

        <label for="age">Age</label>
        <input type="number" name="age" id="age" placeholder="Enter age" required>
        @error('age') <div class="error">{{ $message }}</div> @enderror

        <label for="phone">Phone</label>
        <input type="tel" name="phone" id="phone" placeholder="Enter phone number" required>
        @error('phone') <div class="error">{{ $message }}</div> @enderror

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter email address" required>
        @error('email') <div class="error">{{ $message }}</div> @enderror

        <label for="place">Place</label>
        <input type="text" name="place" id="place" placeholder="Enter place" required>
        @error('place') <div class="error">{{ $message }}</div> @enderror

        <label for="house">House</label>
        <input type="text" name="house" id="house" placeholder="Enter house name" required>
        @error('house') <div class="error">{{ $message }}</div> @enderror

        <label for="medicalHistory">Medical History</label>
        <input type="text" name="medicalHistory" id="medicalHistory" placeholder="Enter medical history" required>
        @error('medicalHistory') <div class="error">{{ $message }}</div> @enderror

        <label for="doctor">Select Doctor</label>
        <select name="doctor_id" id="doctor" required>
            <option value="">--Select Doctor--</option>
            @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}">{{ $doctor->name }} ({{ $doctor->specialized }})</option>
            @endforeach
        </select>
        @error('doctor_id') <div class="error">{{ $message }}</div> @enderror

        <button type="submit" class="btn">Register</button>
    </form>
</div>
@endsection
