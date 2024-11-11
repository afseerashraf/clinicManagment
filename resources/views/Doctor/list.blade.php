@extends('layout.adminLayout')

@section('title', 'Admin Dashboard') 

@section('content')

<style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        max-width: 1200px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h3 {
        text-align: center;
        color: #0d6efd;
        margin-bottom: 30px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .table th, .table td {
        border: 1px solid #dee2e6;
        padding: 12px;
        text-align: left;
    }

    .table th {
        background-color: #0d6efd;
        color: white;
        font-weight: bold;
    }

    .table img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    .btn-outline-primary {
        margin-bottom: 20px;
    }

    .btn-outline-danger {
        margin: 5px;
    }
</style>

<div class="container">
    <h3>Our Doctors</h3>
    <a href="{{ route('doctor.index') }}" class="btn btn-outline-primary">Register Doctor</a>
    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Doctor Name</th>
                <th>Doctor Email</th>
                <th>Phone</th>
                <th>Specialization</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)  
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ucwords($doctor->name) }}</td>
                    <td>{{ $doctor->email }}</td>
                    <td>{{ $doctor->phone }}</td>
                    <td>{{ strtoupper($doctor->specialized) }}</td>
                    <td>
                        @if($doctor->image)
                            <img src="{{ asset('storage/images/'.$doctor->image) }}" alt="Doctor Image">
                        @else
                            <p>No Image</p>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('delete.doctor', encrypt($doctor->id)) }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this doctor?')">Delete</a>
                        <a href="{{ route('edit.doctor', encrypt($doctor->id)) }}" class="btn btn-outline-success">Update</a>
                   </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
