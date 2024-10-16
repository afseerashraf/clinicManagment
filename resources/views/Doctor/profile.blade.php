@extends('layout.layout')
@section('title')Doctor profile @endsection
<style>
    .doctor{
        margin-left: 50p;
    }
</style>
@section('content')
<div class="continer">
    <div class="doctor">
   @if($doctor->image) 
   <img src="{{ asset('storage/images/'.$doctor->image) }}" alt="doctor image">
   @endif
    <ul>
        <li>Name: {{ $doctor->name }}</li>
        <li>Email: {{ $doctor->email }}</li>
        <li>Specialized: {{ $doctor->specialized }}</li>
        </ul>
</div>
       <h3>patients</h3>
       <!-- patient detiels -->
      <table class="table">
        <thead>
            <tr>
                <th>no</th>
                <th>Patient Name</th>
                <th>Age</th>
                <th>Place</th>
                <th>Medical History</th>
                <th>Treatment</th>
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
                        <a href="{{ route('doctor.treatment', encrypt($patient->id)) }}" class="btn btn-outline-primary">Treatment</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </thead>
      </table>
    
</div>
@endsection


               
