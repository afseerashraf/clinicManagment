@extends('layout.receptionistLayout')
@section('title') Patient Register @endsection
<link rel="stylesheet" href="{{ asset('patient/css/register.css') }}">
@section('content')
<div class="form-container">
    <h3>Patient Registration</h3>

    @if(Session()->has('register'))
        <div class="class"> {{ Session()->get('register')}} </div>
    @endif
    
    <form action="{{ route('patient.register') }}" method="POST">
        @csrf

        <label for="date">Appointment Date</label>
        <input type="date" name="date" id="date" required>
        @error('date') <div class="error">{{ $message }}</div> @enderror

        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter full name" required>
        @error('name') <div class="error">{{ $message }}</div> @enderror

        <label for="age">Age</label>
        <input type="numaric" name="age" id="age" placeholder="Enter age" required>
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

<script>

</script>


@endsection

