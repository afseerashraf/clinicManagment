<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaybillRequest;
use Illuminate\Http\Request;
use App\Models\Treatment;
use App\Models\Bill;
use Illuminate\Support\Facades\Crypt;
use App\Mail\PatientBill;
use Illuminate\Support\Facades\Mail;
use App\Jobs\PatientsBillEmail;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PatientbillsController extends Controller
{
    public function payBill(PaybillRequest $request)
    {
        $payBill = new Bill();
        $payBill->treatment_id = Crypt::decrypt($request->treatment_id);

        $payBill->doctor_fees = $request->doctor_fees;

        if ($request->has('additional_charges')) {
            $payBill->additional_charges =  $request->additional_charges;
            $payBill->total_amount =  $payBill->doctor_fees +  $payBill->additional_charges;
        } else {
            $payBill->total_amount =  $payBill->doctor_fees;
        }
        $payBill->check_out = now();
        $payBill->save();
        $pdf = PDF::loadView('bill.pdfBill', compact('payBill')); // Use a blade view to format the bill
        $pdfPath = storage_path('app/public/bills/' . 'bill_' . $payBill->id. '.pdf');
        $pdf->save($pdfPath);
        PatientsBillEmail::dispatch($payBill, $pdfPath);
        return view('bill.bill', compact('payBill'));
    }

    public function paidPatients()
    {
        $payBill = Bill::latest()->get();
        return view('bill.patientsBill', compact('payBill'));
    }
    public function paydbill(Request $request){
        $payBill = Bill::find(Crypt::decrypt($request->treatment_id));
        return view('bill.bill', compact('payBill'));
    }
    
}
