<ul>
    <li> Name: {{ $patientBill->treatment->patient->name }} </li>
    <li> Doctor: {{ $patientBill->treatment->doctor->name }} </li>
    <li>Doctor Fees: {{ $patientBill->doctor_fees }}</li>
    <li>
     @if( $patientBill->additional_charges)
       Additional charges: {{ $patientBill->additional_charges }}
    @endif
     </li>
     <h3>total amount{{ $patientBill->total_amount }}</h3>
   
</ul>