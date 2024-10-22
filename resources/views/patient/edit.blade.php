@extends('layout.adminLayout')
@section('title') Patient Update @endsection

<style>
    * {
        box-sizing: border-box; /* Ensure padding and margin don't affect width */
    }

    body {
        font-family: Arial, sans-serif; /* Set a clean font for the body */
        background-color: #f9f9f9; /* Light background for contrast */
        color: #333; /* Dark text color for readability */
    }

    .container {
        padding: 20px; /* Add padding for inner spacing */
        margin: 60px auto; /* Center the container with top margin */
        width: 500px; /* Set a fixed width for consistency */
        background-color: #f2e7e5; /* Soft background color */
        border-radius: 10px; /* Rounded corners for a modern look */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
    }

    h3 {
        text-align: center; /* Center the title */
        margin-bottom: 20px; /* Space below the title */
        color: #007bff; /* Blue color for title */
    }

    label {
        font-weight: bold; /* Bold labels for better emphasis */
        margin-top: 10px; /* Spacing above labels */
        display: block; /* Make labels block elements */
    }

    input[type="text"],
    input[type="email"],
    input[type="date"],
    select {
        width: calc(100% - 24px); /* Full width minus padding */
        padding: 12px; /* Padding for input fields */
        margin-top: 5px; /* Spacing above input fields */
        margin-bottom: 15px; /* Space below input fields */
        border: 1px solid #ccc; /* Light border for inputs */
        border-radius: 5px; /* Rounded corners for inputs */
        font-size: 16px; /* Consistent font size */
    }

    .btn {
        width: 100%; /* Full width for button */
        padding: 12px; /* Padding for button */
        background-color: #007bff; /* Button background color */
        color: white; /* White text color */
        border: none; /* No border for button */
        border-radius: 5px; /* Rounded corners for button */
        font-size: 18px; /* Increase button font size */
        cursor: pointer; /* Pointer cursor on hover */
        transition: background-color 0.3s; /* Smooth background color transition */
    }

    .btn:hover {
        background-color: #0056b3; /* Darker blue on hover */
    }

    .alert {
        color: red; /* Red color for error messages */
        font-size: 14px; /* Smaller font size for alerts */
        margin-top: -10px; /* Adjust margin for alignment */
        margin-bottom: 10px; /* Space below alert */
    }
</style>

@section('content')
<div class="container">
    <h3>🩺 Update Patient Details</h3>
    <form action="{{ route('patient.update') }}" method="post">
        @csrf
        <input type="hidden" name="patient_id" value="{{ encrypt($patient->id) }}">

        <label for="date">Appointment Date</label>
        <input type="date" class="form-controller" name="date" value="{{ $patient->appoinment_date ? $patient->appoinment_date->format('Y-m-d') : '' }}">
        @error('date') <div class="alert">{{ $message }}</div> @enderror

        <label for="name">Name</label>
        <input type="text" class="form-controller" name="name" value="{{ $patient->name }}">
        @error('name') <div class="alert">{{ $message }}</div> @enderror

        <label for="age">Age</label>
        <input type="text" class="form-controller" name="age" value="{{ $patient->age }}">
        @error('age') <div class="alert">{{ $message }}</div> @enderror

        <label for="phone">Phone</label>
        <input type="text" class="form-controller" name="phone" value="{{ $patient->phone }}">
        @error('phone') <div class="alert">{{ $message }}</div> @enderror

        <label for="email">Email</label>
        <input type="email" class="form-controller" name="email" value="{{ $patient->email }}">
        @error('email') <div class="alert">{{ $message }}</div> @enderror

        <label for="place">Place</label>
        <input type="text" class="form-controller" name="place" value="{{ $patient->place }}">
        @error('place') <div class="alert">{{ $message }}</div> @enderror

        <label for="house">House</label>
        <input type="text" class="form-controller" name="house" value="{{ $patient->house }}">
        @error('house') <div class="alert">{{ $message }}</div> @enderror

        <label for="history">Medical History</label>
        <input type="text" class="form-controller" name="medicalHistory" value="{{ $patient->medical_history }}">
        @error('medicalHistory') <div class="alert">{{ $message }}</div> @enderror

        <label for="doctor">Select Doctor</label>
        <select name="doctor_id" class="form-controller">
            <option value="" disabled selected>Select a doctor</option>
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}" {{ $doctor->id == $patient->doctor_id ? 'selected' : '' }}>
                    {{ $doctor->name }} ({{ $doctor->specialized }})
                </option>
            @endforeach
        </select>

        <input type="submit" class="btn" value="Update">
    </form>
</div>
@endsection
