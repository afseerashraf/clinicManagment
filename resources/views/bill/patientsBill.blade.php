@extends('layout.receptionistLayout')
@section('title')Patients Bill @endsection

@section('content')
<div class="continer">
<table class="table">
        <thead>
            <tr>
                <th>no</th>
                <th>Patient Name</th>
                <th>Patient Email</th>
                <th>Doctor Name</th>
                <th>Doctor Department</th>
                <th>Fees</th>
                <th>Check Out</th>
                
            </tr>
            <tbody>
       
            @foreach($payBills as $payBill)  
           
               <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $payBill->treatment->patient->name }}</td>
                <td>{{ $payBill->treatment->patient->email }}</td>
                <td>{{ $payBill->treatment->doctor->name }}</td>
                <td>{{ $payBill->treatment->doctor->specialized }}</td>
                <td>{{ $payBill->total_amount}}</td>
                <td>{{ $payBill->check_out}}</td>
               </tr>
              
            @endforeach
            
            </tbody>
        </thead>
      </table>
    
</div>
@endsection