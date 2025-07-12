<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaybillRequest;
use App\Jobs\PatientsBillEmail;
use App\Models\Bill;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PatientbillsController extends Controller
{
    public function payBill(PaybillRequest $request)
    {
        $payBill = new Bill;

        $payBill->treatment_id = Crypt::decrypt($request->treatment_id);

        $payBill->doctor_fees = $request->doctor_fees;

        if ($request->has('additional_charge')) {

            $payBill->additional_charges = $request->additional_charge;

            $payBill->total_amount = $payBill->doctor_fees + $payBill->additional_charge;
        
        } else {
            
            $payBill->total_amount = $payBill->doctor_fees;
        }

        $payBill->check_out = now();

        $payBill->save();

        $pdf = PDF::loadView('bill.pdfBill', compact('payBill')); // Use a blade view to format the bill

        $pdfPath = storage_path('app/public/bills/'.'bill_'.$payBill->id.'.pdf');
        
        $pdf->save($pdfPath);

        PatientsBillEmail::dispatch($payBill, $pdfPath);

        return view('bill.bill', compact('payBill'));
    }

    public function paidPatients()
    {
        $payBills = Bill::all();

        return view('bill.patientsBill', compact('payBills'));
    }

    public function paydbill(Request $request)
    {
        $payBill = Bill::find(Crypt::decrypt($request->treatment_id));

        return view('bill.bill', compact('payBill'));
    }
}
