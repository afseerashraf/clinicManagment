@extends('layout.layout')
@section('title')Receptionist Profile @endsection

<style>
    .container {
        margin: 100px auto;
        padding: 20px;
        background-color: #f8f9fa;
        width: 50%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        font-family: Arial, sans-serif;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 15px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 6px;
        text-decoration: none;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #0056b3;
    }
</style>

@section('content')

<div class="container">
    <h3>Receptionist Details</h3>
    <ul>
        <li><strong>Name:</strong> {{ $receptionist->name }}</li>
        <li><strong>Email:</strong> {{ $receptionist->email }}</li>
        <li><strong>Phone:</strong> {{ $receptionist->phone }}</li>
    </ul>
    <a href="{{ route('patient.index') }}" class="btn">Register New Patients</a>
</div>

@endsection
