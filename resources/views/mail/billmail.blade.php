<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .invoice-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-header h2 {
            margin: 0;
            color: #007bff;
        }
        .invoice-details {
            width: 100%;
            margin-bottom: 20px;
        }
        .invoice-details th, .invoice-details td {
            padding: 10px;
            text-align: left;
        }
        .invoice-details th {
            background-color: #f1f1f1;
        }
        .total-amount {
            text-align: right;
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h2>AFz Clinic</h2>
            <p>Vellikulangara +919988223355</p>
        </div>
        <table class="invoice-details">
            <tr>
                <th>Patient Name:</th>
                <td>{{ $patientBill->treatment->patient->name }}</td>
            </tr>
            <tr>
                <th>Doctor:</th>
                <td>{{ $patientBill->treatment->doctor->name }}</td>
            </tr>
            <tr>
                <th>Doctor Fees:</th>
                <td>{{ $patientBill->doctor_fees }}</td>
            </tr>
            @if($patientBill->additional_charges)
            <tr>
                <th>Additional Charges:</th>
                <td>{{ $patientBill->additional_charges }}</td>
            </tr>
            @endif
        </table>
        <div class="total-amount">
            Total Amount: {{ $patientBill->total_amount }}
        </div>
    </div>
</body>
</html>
