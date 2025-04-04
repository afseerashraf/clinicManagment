<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\Support\Facades\Crypt;

class TreatmentController extends Controller
{
    public function unpaidPatients()
    {
        $treatments = Treatment::whereDoesntHave('bill')->get(); // fetch the all unpaid patients who get the treatment.

        return view('treatment.unpaidPatientList', compact('treatments'));
    }

    public function destroyPatient($id)
    {
        $patient = Treatment::find(Crypt::decrypt($id));
        $patient->delete();

        return redirect()->route('patients.treatment');
    }

    public function bill($id)
    {
        $treatmentBill = Treatment::find(crypt::decrypt($id));

        return view('bill.treatmentBill', compact('treatmentBill'));
    }
}
