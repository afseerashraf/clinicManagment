@extends('layout.layout')

@section('title', 'Doctor Profile')

@section('content')
@if(isset($patient) && $patient->isNotEmpty())
    <table class="table">
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Check-in Time</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($patient as $patient)
                <tr>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->check_in}}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>{{ $message ?? 'No patients found.' }}</p>
@endif
@endsection