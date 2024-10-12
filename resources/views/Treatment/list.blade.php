@extends('layout.adminLayout')
@section('title')Admin Dashboard @endsection
@section('content')

<h3>Treatments</h3>
<table class="table">
    <thead>
        <tr>
            <th>no</th>
            <th>Patient Name</th>
            <th>Doctor Name</th>
            <th>Specialized</th>
            <th>Treatment Description</th>
            <th>Date</th>

        </tr>
    <tbody>
        @foreach($treatments as $treatment)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $treatment->patient->name }}</td>
            <td>
                @if($treatment->doctor)
                    {{ $treatment->doctor->name }}
                @else
                   <b style="color:red;"> The doctor has resigned from this clinic.</b>
                @endif
            </td>
            <td>
                @if($treatment->doctor)
                   {{ $treatment->doctor->specialized }} 
                @else
                    <b style="color:red;">The doctor has resigned from this clinic.</b>
                @endif
            </td>
            <td>{{ $treatment->treatment_description }}</td>
            <td>{{ $treatment->check_in }}</td>
        </tr>
        @endforeach
    </tbody>
    </thead>
</table>

@endsection