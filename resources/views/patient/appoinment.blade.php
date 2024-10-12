@extends('layout.adminLayout')
@section('title')Admin Dashboard @endsection
@section('content')

<h3>Patients</h3>
<table class="table">
    <thead>
        <tr>
            <th>no</th>
            <th>Patient Name</th>
            <th>Age</th>
            <th>Place</th>
            <th>Medical History</th>
            <th>Doctor</th>
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
        </tr>
        @endforeach
    </tbody>
    </thead>
</table>

@endsection