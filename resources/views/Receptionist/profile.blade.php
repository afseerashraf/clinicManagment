@extends('layout.receptionistLayout')
@section('title')Receptionist Profile @endsection

<link rel="stylesheet" href="{{ asset('receptionist/css/profile.css') }}">

@section('content')

<div class="container">
    <h3>Receptionist Details</h3>
    <ul>
        <li><strong>Name:</strong> {{ $receptionist->name }}</li>
        <li><strong>Email:</strong> {{ $receptionist->email }}</li>
        <li><strong>Phone:</strong> {{ $receptionist->phone }}</li>
        <a href="{{ route('receptionist.logout', encrypt('$receptionist->id')) }}" class="btn danger">Logout</a>

    </ul>

</div>

@endsection
