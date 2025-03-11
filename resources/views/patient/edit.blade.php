@extends('layout.adminLayout')
@section('title') Patient Update @endsection

<link rel="stylesheet" href="{{ asset('patient/css/edit.css') }}">
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
