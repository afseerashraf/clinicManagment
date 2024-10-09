@extends('layout.adminLayout')
@section('title')Admin Dashboard @endsection
@section('content')

<h3>Our Doctors</h3>
<table class="table">
        <thead>
            <tr>
                <th>no</th>
                <th>Doctor Name</th>
                <th>Doctor Email</th>
                <th>phone</th>
                <th>Specialized</th>
                <th>image</th>
            </tr>
            <tbody>
            @foreach($doctors as $doctor)  
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->email }}</td>
                    <td>{{ $doctor->phone }}</td>
                    <td>{{ $doctor->specialized }}</td>
                    <td><img src="{{ asset('storage/images/'.$doctor->image) }}" alt="doctor Image"></td>
                </tr>
                @endforeach
            </tbody>
        </thead>
      </table>
    
@endsection