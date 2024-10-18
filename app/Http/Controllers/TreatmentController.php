<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Patient;
use App\Models\Treatment;

class TreatmentController extends Controller
{
   public function unpaidPatients(){
      $treatments = Treatment::whereDoesntHave('bill')->get(); //fetch the tretment geted patient who not paid bill.
      return view('treatment.unpaidPatientList', compact('treatments'));
   }
   public function destroyPatient($id){
      $patient = Treatment::find(Crypt::decrypt($id));
      $patient->delete();
      return redirect()->route('patients.treatment');
   }
   public function bill($id){
      $treatmentBill = Treatment::find(crypt::decrypt($id));
      return view('bill.treatmentBill', compact('treatmentBill'));
   }
}
