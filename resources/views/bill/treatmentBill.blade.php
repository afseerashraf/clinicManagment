@extends('layout.layout')
@section('title')Patient Bill @endsection
<link rel="stylesheet" href=" {{ asset('bill/css/treatmentBill.css') }} ">
@section('content')
<div class="container">
    <h3>Patient Details</h3>
    <ul>
        <li><strong>Patient Name:</strong> {{ $treatmentBill->patient->name }}</li>
        <li><strong>Patient Age:</strong> {{ $treatmentBill->patient->age }}</li>
        <li><strong>Patient Place:</strong> {{ $treatmentBill->patient->place }}</li>
        <li><strong>Patient House:</strong> {{ $treatmentBill->patient->house }}</li>
        <li><strong>Doctor:</strong> {{ $treatmentBill->doctor->name }} ({{ $treatmentBill->doctor->specialized }})</li>
        @if($treatmentBill->additional_notes)
        <li><strong>Additional Notes:</strong> <b>{{ $treatmentBill->additional_notes }}</b></li>
        @endif
    </ul>

    <form action="{{ route('bill.pay') }}" method="post">
        @csrf
        <input type="hidden" name="treatment_id" value="{{ encrypt($treatmentBill->id) }}">

        
        <label for="doctor_fees">Doctor Fees</label>
        
        <input type="text" class="form-controller" name="doctor_fees" placeholder="Enter fees">
        @error('doctor_fees') 
        <p class="error-message">{{ $message }}</p> 
        @enderror

        
        <label for="additional_charge">Additional Charges</label>
       
        <input type="text" class="form-controller" name="additional_charge" placeholder="Lab test, etc.">
        @error('additional_charge') 
        <p class="error-message">{{ $message }}</p> 
        @enderror

        <input type="submit" value="Pay Bill">
    </form>
</div>
@endsection
