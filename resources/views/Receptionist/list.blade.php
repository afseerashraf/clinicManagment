@extends('layout.adminLayout')
@section('title')Admin Dashboard @endsection

<style>
    .dashboard-container {
        margin: 20px auto;
        width: 90%;
        font-family: Arial, sans-serif;
    }

    h3 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        font-weight: bold;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
        background-color: #f9f9f9;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    thead {
        background-color: #007bff;
        color: white;
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tbody tr:hover {
        background-color: #e0f7fa;
        cursor: pointer;
    }

    th {
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 1px;
    }

    td {
        font-size: 14px;
        color: #333;
    }
</style>

@section('content')
<div class="dashboard-container">
    <h3>Receptionist List</h3>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Place</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($receptionists as $receptionist)  
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $receptionist->name }}</td>
                <td>{{ $receptionist->email }}</td>
                <td>{{ $receptionist->place }}</td>
                <td>{{ $receptionist->phone }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
