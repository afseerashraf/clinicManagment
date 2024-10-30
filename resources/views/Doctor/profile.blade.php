@extends('layout.layout')

@section('title', 'Doctor Profile')

@section('content')

<style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .doctor {
        text-align: center;
        margin-bottom: 30px;
    }

    .doctor img {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        object-fit: cover;
    }

    h3 {
        text-align: center;
        color: #0d6efd;
        margin-bottom: 20px;
    }

    ul {
        list-style-type: none;
        padding: 0;
        font-size: 16px;
        color: #333;
    }

    ul li {
        margin-bottom: 10px;
    }

    .search-form {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .search-form input[type="search"] {
        width: 70%;
        margin-right: 10px;
    }

    .table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    .table th, .table td {
        border: 1px solid #dee2e6;
        padding: 10px;
        text-align: left;
    }

    .table th {
        background-color: #0d6efd;
        color: white;
    }

    .btn-outline-primary {
        margin-top: 10px;
    }
</style>

<div class="container">
    <div class="doctor">
        @if($doctor->image)
            <img src="{{ asset('storage/images/'.$doctor->image) }}" alt="Doctor Image">
        @else
            <img src="{{ asset('storage/images/default-avatar.png') }}" alt="Default Avatar">
        @endif
        <ul>
            <li><strong>Name:</strong> {{ $doctor->name }}</li>
            <li><strong>Email:</strong> {{ $doctor->email }}</li>
            <li><strong>Specialization:</strong> {{ $doctor->specialized }}</li>
        </ul>
    </div>

    <h3>Patients</h3>

    <form class="search-form" action="{{ route('getPatient') }}" method="get">
        @csrf
        <input type="hidden" name='doctor_id' value="{{ encrypt($doctor->id) }}">
        <input class="form-control me-2" name="patientName" type="search" placeholder="Search Patient" aria-label="Search">
        @error('patientName') <p class="alert alert-danger">{{ $message }}</p> @enderror
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    @if(auth()->guard('doctor')->check() && auth()->guard('doctor')->user()->hasPermissionTo('patient_treatment'))

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Patient Name</th>
                <th>Age</th>
                <th>Place</th>
                <th>Medical History</th>
                <th>Treatment</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->age }}</td>
                <td>{{ $patient->place }}</td>
                <td>{{ $patient->medical_history }}</td>
                <td>
                    <a href="{{ route('doctor.treatment', encrypt($patient->id)) }}" class="btn btn-outline-primary">Treatment</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        @endif
    </table>
</div>

@endsection
