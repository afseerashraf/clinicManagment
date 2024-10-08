@extends('layout.layout')
@section('title')Patient Register @endsection
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
        height: 613px;
        box-shadow: 1px 1px 1px 1px;

    }

    .btn {
        padding-top: 12px;
    }

    input {
        width: 400px;
    }
</style>
@section('content')

<div class="continer">
    <h3>Register Form</h3>
    <form action="{{ route('patient.register') }}" method="post">
        @csrf
        <label for="date">Appoinment Date</label>
        <input type="date" class="form-controller" name="date" id="">
        <label for="name">Name</label><br>
        <input type="text" class="form-controller" name="name" placeholder="Name"><br>
        @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror

        <label for="age">Age</label>
        <input type="text" class="form-controller" name="age" placeholder="age">
        @error('age') <div class="alert">{{ $message }}</div> @enderror

        <label for="phone">Phone</label>
        <input type="text" class="form-controller" name="phone" placeholder="phone"><br>
        @error('phone') <div class="alert">{{ $message }}</div> @enderror

        <label for="email">email</label><br>
        <input type="email" class="form-controller" name="email" placeholder="email"><br>
        @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror

        <label for="phone">Place</label>
        <input type="text" class="form-controller" name="place" placeholder="place"><br>
        @error('place') <div class="alert">{{ $message }}</div> @enderror

        <label for="phone">House</label>
        <input type="text" class="form-controller" name="house" placeholder="house"><br><br>
        @error('house') <div class="alert">{{ $message }}</div> @enderror

        <label for="history">Medical History</label>
        <input type="text" class="form-controller" name="medicalHistory" placeholder="history"><br><br>
        @error('medicalHistory') <div class="alert">{{ $message }}</div> @enderror

        <label for="doctor">Select Doctor</label>
        <select name="doctor_id" class="form-controller">
            <option value="">--Select Doctor--</option>
            @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}">{{ $doctor->name }} ({{ $doctor->specialized }})</option>
            @endforeach
        </select>
        <input type="submit" class="btn btn-outline-primary" value="register">
    </form>
</div>
@endsection