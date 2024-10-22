@extends('layout.layout')
@section('title')Receptionist profile @endsection
<style>
    .continer{
        margin-left: 150px;
        margin-top: 100px;
    }
</style>
@section('content')
<div class="continer">
    <ul>
        <li>Name: {{ $receptionist->name }}</li>
        <li>Email: {{ $receptionist->email }}</li>
        <li>Specialized: {{ $receptionist->phone }}</li>
    </ul>
    <a href="{{ route('patient.index') }}" class="btn btn-outline-primary">Register new patients</a>

@endsection