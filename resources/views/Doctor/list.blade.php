@extends('layout.adminLayout')

@section('title', 'Admin Dashboard') 
<link rel="stylesheet" href="{{ asset('doctor/css/list.css') }}">
@section('content')


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
                        <a href="{{ route('edit.doctor', encrypt($doctor->id)) }}" class="btn btn-outline-danger">Update</a>

                   </td>
                   
                </tr>
            @endforeach
        </tbody>
    </table> 
 {{-- <table id="doctors" class="displayDoctors">
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

        </tbody>
 </table> --}}
</div>


@endsection
