@extends('layout.adminLayout')
@section('title')Admin Dashboard @endsection
<link rel="stylesheet" href="{{ asset('receptionist/css/list.css') }}">
@section('content')
<div class="dashboard-container">
    <h3>Receptionist List</h3>
    <a href="{{route('receptionist.index')}}" class="btn btn-outline-primary">Register Receptionist</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Place</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($receptionists as $receptionist)  
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ ucwords($receptionist->name) }}</td>
                <td>{{ $receptionist->email }}</td>
                <td>{{ $receptionist->place }}</td>
                <td>{{ $receptionist->phone }}</td>
                <td>
                    <a href="{{ route('delete.receptionist', encrypt($receptionist->id)) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this: {{$receptionist->name}}?')">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
