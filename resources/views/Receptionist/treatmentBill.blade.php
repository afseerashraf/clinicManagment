@extends('layout.adminLayout')
@section('title')Admin Dashboard @endsection
@section('content')

<b>doctor : {{ $treatment->doctor->name }}</b><br>
<b>Patient: {{ $treatment->patient->name }}</b>
<div class="continer">
    <form action="{{ route('bill.pay') }}" method="post">
        @csrf
        <input type="hidden" name="treatment_id" value="{{ encrypt($treatment->id) }}">
        <label for="">doctor Fees</label><br>
        <input type="text" class="form-controller" name="doctor_fees"><br>
        <label for="treatment">Treatment Cost</label><br>
        <input type="text" class="form-controller" name="treatment_fees"><br></br>
        <input type="submit" value="print">
    </form>
</div>
@endsection