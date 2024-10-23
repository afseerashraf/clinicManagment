@extends('layout.layout')
@section('title')Patient Treatment @endsection
<style>
    body {
        font-family: Arial, sans-serif;
    }

    .details {
        margin: 40px auto;
        padding: 20px;
        max-width: 600px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .details ul {
        list-style: none;
        padding-left: 0;
    }

    .details ul li {
        margin-bottom: 10px;
        font-size: 18px;
        font-weight: bold;
    }

    .treatment-form {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    label {
        margin-bottom: 5px;
        font-weight: bold;
    }

    textarea, input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 16px;
    }

    .btn {
        background-color: #007bff;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #0056b3;
    }

</style>
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
    <form action="{{ route('treatment') }}" method="POST">
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
