@extends('layout.layout')
@section('title')Patient Bill @endsection

<style>
    .container {
        margin: 50px auto;
        max-width: 800px;
        background-color: #f9f9f9;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h3 {
        color: #333;
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    ul li {
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
        font-size: 16px;
    }

    ul li:last-child {
        border-bottom: none;
    }

    b {
        color: #d9534f;
    }

    .form-controller {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 16px;
    }

    label {
        font-size: 18px;
        color: #555;
        margin-top: 10px;
        display: block;
    }

    input[type="submit"] {
        background-color: #5cb85c;
        color: white;
        border: none;
        padding: 15px 20px;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #4cae4c;
    }

    .error-message {
        color: #d9534f;
        font-size: 14px;
        margin-top: -10px;
    }
</style>

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
