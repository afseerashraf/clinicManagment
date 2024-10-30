<div style="font-family: Arial, sans-serif; color: #333;">
    <h1 style="text-align: center; font-size: 24px; color: #4CAF50;">Patient Bill</h1>
    
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <tr>
            <td style="padding: 10px 0; font-size: 16px;"><strong>Name:</strong></td>
            <td style="padding: 10px 0; font-size: 16px;">{{ $payBill->treatment->patient->name }}</td>
        </tr>
        <tr style="background-color: #f9f9f9;">
            <td style="padding: 10px 0; font-size: 16px;"><strong>Doctor:</strong></td>
            <td style="padding: 10px 0; font-size: 16px;">{{ $payBill->treatment->doctor->name }}</td>
        </tr>
        <tr>
            <td style="padding: 10px 0; font-size: 16px;"><strong>Doctor Fees:</strong></td>
            <td style="padding: 10px 0; font-size: 16px;">${{ number_format($payBill->doctor_fees, 2) }}</td>
        </tr>
        @if($payBill->additional_charges)
        <tr style="background-color: #f9f9f9;">
            <td style="padding: 10px 0; font-size: 16px;"><strong>Additional Charges:</strong></td>
            <td style="padding: 10px 0; font-size: 16px;">${{ number_format($payBill->additional_charges, 2) }}</td>
        </tr>
        @endif
        <tr>
            <td style="padding: 10px 0; font-size: 16px; font-weight: bold;"><strong>Total Amount:</strong></td>
            <td style="padding: 10px 0; font-size: 16px; font-weight: bold;">${{ number_format($payBill->total_amount, 2) }}</td>
        </tr>
        <tr>
            <td style="padding: 10px 0; font-size: 16px; font-weight: bold;"><strong>check_In:</strong></td>
            <td style="padding: 10px 0; font-size: 16px; font-weight: bold;">{{ $payBill->treatment->patient->check_in}}</td>
        </tr>
        <tr>
            <td style="padding: 10px 0; font-size: 16px; font-weight: bold;"><strong>check_out:</strong></td>
            <td style="padding: 10px 0; font-size: 16px; font-weight: bold;">{{ $payBill->check_out}}</td>
        </tr>
    </table>

    <!-- <div style="text-align: center; margin-top: 30px;">
        <a href="{{ route('bill.download', encrypt($payBill->id)) }}" style="background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Download PDF</a>
    </div> -->
</div>
