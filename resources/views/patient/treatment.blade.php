@extends('layout.layout')
@section('title')Patient Treatment @endsection
<link rel="stylesheet" href="{{ asset('patient/css/treatment.css') }}">
@section('content')

<!-- Patient Details -->
<div class="details">
    <ul>
        <li>Name: {{ $patient->name }}</li>
        <li>Age: {{ $patient->age }}</li>
        <li>Phone: {{ $patient->phone }}</li>
        <li>Doctor: {{ $patient->doctor->name }}</li>
    </ul>
</div>

<!-- Treatment Form -->
<div class="treatment-form">
    @if(Session()->has('done'))
        <div class="div"><p>{{ Session()->get('done') }}</p></div>
    @endif
    <form action="{{ route('Patient_treatment') }}" method="POST">
        @csrf
        <input type="hidden" name="patient_id" value="{{ encrypt($patient->id) }}">
        
        <label for="treatment_description">Treatment Description:</label>
        <textarea name="treatment_description" class="form-control" rows="4" required></textarea>

        <label for="additional_notes">Additional Notes:</label>
        <textarea name="additional_notes" class="form-control" rows="2"></textarea>

        <button type="submit" class="btn mt-2">Submit</button>
    </form>
</div>

@endsection
