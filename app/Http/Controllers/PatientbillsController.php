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
        $payBill->save();
        PatientsBillEmail::dispatch($payBill);
        return redirect()->route('show.paidPatients');
    }

    public function paidPatients()
    {
        $payBill = Bill::all();
        return view('bill.patientsBill', compact('payBill'));
    }
}
