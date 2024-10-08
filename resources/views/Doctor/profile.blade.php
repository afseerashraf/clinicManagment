@extends('layout.layout')
@section('title')Doctor profile @endsection

@section('content')
<div class="continer">
    <img src="{{ asset('storage/images/'.$doctor->image) }}" alt="doctor image">
    <ul>
        <li>Name: {{ $doctor->name }}</li>
        <li>Email: {{ $doctor->email }}</li>
        <li>Specialized: {{ $doctor->specialized }}</li>
        </ul>
       <h3>patients</h3>
       
      <table class="table">
        <thead>
            <tr>
                <th>no</th>
                <th>Patient Name</th>
                <th>Age</th>
                <th>Place</th>
                <th>Medical History</th>
            </tr>
            <tbody>
            @foreach($doctor->patients as $patient)  
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->age }}</td>
                    <td>{{ $patient->place }}</td>
                    <td>{{ $patient->medical_history }}</td>
                </tr>
                @endforeach
            </tbody>
        </thead>
      </table>
    
</div>
@endsection