@extends('layout.layout')
@section('title')Patient Treatment @endsection
<style>
.treatment{
    height: 300px;
    width: 300px;
    margin-left: 300px;
    padding-top: 100px;
}
.detiles{
    margin-left: 170px;
}
</style>
@section('content')
<div class="detiles">
    <Ul>
    <b>
        <li>Name: {{ $patient->name }} </li>
        <li>Age: {{ $patient->age }} </li>
        <li>Phone: {{ $patient->medical_history }}</li>
        <li>Doctor: {{ $patient->doctor->name }}</li>
    </b>
    </Ul>
</div>

<div class="treatment">
<form action="{{ route('treatment') }}" method="POST">
    @csrf
    <input type="hidden" name="patient_id" value="{{ encrypt($patient->id) }}">
   
   
    
    <label for="treatment_description">Treatment Description:</label>
    <textarea name="treatment_description" class="form-control" rows="3" required></textarea>

    <label for="additional_notes">Additional Notes:</label>
    <textarea name="additional_notes" class="form-control" rows="2"></textarea>

    <button type="submit" class="btn btn-primary mt-2">Submit</button>
</form>
</div>
@endsection