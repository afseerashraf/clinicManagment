@extends('layout.adminLayout')
@section('title')Admin Dashboard @endsection
@section('content')

<h3>Receptionist</h3>
<table class="table">
        <thead>
            <tr>
                <th>no</th>
                <th>Name</th>
                <th>Email</th>
                <th>Place</th>
                <th>Phone</th>
            </tr>
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
        </thead>
      </table>
    
@endsection