@extends('layout.layout')

@section('title', 'Doctor Profile')

@section('content')

<link rel="stylesheet" href="{{ asset('doctor/css/profile.css') }}">
<div class="container">
    <div class="doctor">
    @if($doctor->image)
            <img src="{{ asset('storage/images/'.$doctor->image) }}" alt="Doctor Image">
    @endif
        <ul>
            <li><strong>Name:</strong> {{ $doctor->name }}</li>
            <li><strong>Email:</strong> {{$doctor->email }}</li>
            <li><strong>Specialization:</strong> {{ $doctor->specialized }}</li>
            <a href="{{ route('doctor.logout', encrypt($doctor->id))}}" class="btn btn-outline-danger">Logout</a>
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

    @if(session()->has('done'))
        <p>{{ session()->get('done') }}</p>
    @endif
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
