<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Patient;
use App\Models\Treatment;
class TreatmentController extends Controller
{
   public function patientsTreatment(){
    $treatments = Treatment::all();
    return view('treatment.list', compact('treatments'));
   }
}
