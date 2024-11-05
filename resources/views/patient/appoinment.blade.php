@extends('layout.receptionistLayout')
@section('title', 'Admin Dashboard')

@section('head')
<style>
    .container {
        margin: 20px auto;
        max-width: 1200px;
        padding: 20px;
        border-radius: 10px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    h3 {
        color: #007bff;
    }
    .alert {
        margin-bottom: 20px;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f2f2f2;
    }
    .btn-outline-success, .btn-outline-danger, .btn-outline-warning {
        font-weight: bold;
    }
</style>
@endsection

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
                <th>#</th>
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
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->age }}</td>
                    <td>{{ $patient->place }}</td>
                    <td>{{ $patient->medical_history }}</td>
                    <td>
                        @if ($patient->doctor)
                            {{ $patient->doctor->name }} ({{ $patient->doctor->specialized }})
                        @else
                            <span class="text-danger">Doctor resigned</span>
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($patient->appoinment_date)->format('Y-F-d') }}</td>
                    <td>{{ \Carbon\Carbon::parse($patient->check_in)->format('H:i:s') }}</td>
                    <td>
                        @if(!$patient->doctor)
                            <a href="{{ route('patient.delete', encrypt($patient->id)) }}" class="btn btn-outline-danger">🗑️ Delete</a>
                        @else
                            <a href="{{ route('patient.edit', encrypt($patient->id)) }}" class="btn btn-outline-warning">✏️ Update</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
