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
            <th>check In</th>
            <th>Action</th>

        </tr>
    <tbody>
        @foreach($treatments as $treatment)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                @if($treatment->patient)
                    {{ $treatment->patient->name }}
                @else
                <b style="color:red;"> The patient has been closed.</b>
                @endif
            </td>
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
            <td>{{ $treatment->treatment_description }}({{ $treatment->additional_notes }})</td>
            <td>{{ $treatment->check_in }}</td>
            <td>
                @if(!$treatment->patient || !$treatment->doctor)
                <a href="{{ route('treatment.delete', encrypt($treatment->id)) }}" class="btn btn-danger">Delete</a>
                @else
                <a href="{{ route('treatment_bill', encrypt($treatment->id)) }}" class="btn btn-success">Bill</a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
    </thead>
</table>

@endsection