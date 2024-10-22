Name: {{ $payBill->treatment->patient->name }} <br>
Doctor: {{ $payBill->treatment->doctor->name }} <br>
Doctor fees: {{ $payBill->doctor_fees }} <br>
@if($payBill->additional_charges)
Additional Charges: {{ $payBill->additional_charges }} <br>
@endif
<b>Totall:</b>{{ $payBill->total_amount }} <br>

<a href="{{ route('bill.download', encrypt($payBill->id)) }}" class="btn">Download</a>
