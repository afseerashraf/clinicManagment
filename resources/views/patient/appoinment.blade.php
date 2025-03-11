@extends('layout.receptionistLayout')
@section('title', 'Receptionist Dashboard')

<link rel="stylesheet" href="{{ asset('patient/css/appoinment.css') }}">

@section('content')

<div class="container">


    <h3 class="text-center mb-4">👥 Patients Appointment List</h3>
    
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="mb-3 text-end">
        <a href="{{ route('patient.index') }}" class="btn btn-outline-success">➕ Register New Patient</a>
    </div>

    <table class="table table-striped">
        <thead class="table-light">
            <tr>
                <th>Id</th>
                <th>Patient Name</th>
                <th>Age</th>
                <th>Place</th>
                <th>Medical History</th>
                <th>Doctor</th>
                <th>Appointment Date</th>
                <th>Check IN</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ucwords($patient->name) }}</td>
                    <td>{{ $patient->age }}</td>
                    <td>{{ ucwords($patient->place) }}</td>
                    <td>{{ $patient->medical_history }}</td>
                    <td>
                        @if ($patient->doctor)
                            {{ ucwords($patient->doctor->name) }} ({{ strtoupper($patient->doctor->specialized) }})
                        @else
                            <span class="text-danger">Doctor resigned</span>
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($patient->appoinment_date)->format('Y-F-d') }}</td>
                    <td>{{ \Carbon\Carbon::parse($patient->check_in)->format('H:i:s') }}</td>
                    <td>
                            <a href="{{ route('patient.delete', encrypt($patient->id)) }}" class="btn btn-outline-danger deletePatient">🗑️ Delete</a>
                        
                            <a href="{{ route('patient.edit', encrypt($patient->id)) }}" class="btn btn-outline-warning">✏️ Update</a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

   
