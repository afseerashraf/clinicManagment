<ul>
    <li> {{ $paybill->treatment->patient->name }} </li>
    <li> {{ $paybill->treatment->doctor->name }} </li>
    <li>{{ $paybill->doctor_fees }}</li>
    <li>
     @if( $paybill->additional_charges)
        {{ $paybill->additional_charges }}
    @endif
     </li>
     <h3>{{ $paybill->total_amount }}</h3>
   
</ul>