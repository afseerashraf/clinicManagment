@extends('layout.layout')
@section('title')Patient Bill @endsection
<style>
    .continer{
        margin-left: 200px;
        background-color:#f2e7e5 ;
       
        
    }
</style>
@section('content')

<ul>
    <h3>patient detiles</h3>
    <li>Patient Name: {{ $treatmentBill->patient->name }}</li>
    <li>Patient Age: {{ $treatmentBill->patient->age }} </li>
    <li>Patient Place: {{ $treatmentBill->patient->place }} </li>
    <li>Patient House: {{ $treatmentBill->patient->house }}</li>
    <li>Doctor: {{ $treatmentBill->doctor->name }} ({{ $treatmentBill->doctor->specialized }})</li>
    
        @if($treatmentBill->additional_notes)
       <li>Additional charge: <b> {{ $treatmentBill->additional_notes }} </b></li> 
        @endif
   
</ul>
<div class="continer">
    <form action="{{ route('bill.pay') }}" method="post">
        @csrf
        <input type="hidden" name="treatment_id" value="{{ encrypt($treatmentBill->id) }}">
        <label for="doctor_fees">Doctor Fees</label><br>
        <input type="text" class="form-controller" name="doctor_fees" placeholder="fees"><br>
        @error('doctor_fees') <p><{{ $message }}</p> @enderror
        <label for="additional charge">additional Charges</label><br>
        <input type="text" class="form-controller" name="additional_charge" placeholder="lab test"><br><br>
        @error('additional_charge') <p>{{ $message }}</p> @enderror
        <input type="submit" value="pay bill">

    </form>
</div>
@endsection