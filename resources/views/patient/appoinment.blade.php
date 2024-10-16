@extends('layout.adminLayout')
@section('title')Admin Dashboard @endsection
@section('content')

<h3>Patients</h3>
@if (session('message')) <div class="alert">{{ session('message') }}</div> @endif
<a href="{{ route('patient.index') }}" class="btn btn-outline-success">Register new Patient</a>
<table class="table">
    <thead>
        <tr>
            <th>no</th>
            <th>Patient Name</th>
            <th>Age</th>
            <th>Place</th>
            <th>Medical History</th>
            <th>Doctor</th>
            <th>Action</th>
        </tr>
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
                The doctor has resigned from this clinic.
                @endif
            </td>
            <td>
                @if(!$patient->doctor)
                    <a href="{{ route('patient.delete', encrypt($patient->id)) }}" class="btn">delete</a>
                @else
                    <a href="{{ route('patient.edit', encrypt($patient->id)) }}" class="btn btn-danger" class="btn btn-outline-success">update</a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
    </thead>
</table>

@endsection