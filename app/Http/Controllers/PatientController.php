<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Treatment;
use Illuminate\Support\Facades\Crypt;

class PatientController extends Controller
{
    public function index(){
        $doctors = Doctor::all();
        return view('patient.register', compact('doctors'));
    }
    public function register(PatientRequest $request){
        $patient = new Patient();
        $patient->appoinment_date = $request->date;
        $patient->name = $request->name;
        $patient->age = $request->age;
        $patient->phone = $request->phone;
        $patient->email = $request->email;
        $patient->place = $request->place;
        $patient->house = $request->house;
        $patient->medical_history = $request->medicalHistory;
        $patient->doctor_id = $request->doctor_id;
        $patient->save();
        return redirect()->route('pateint.view');

    }
    public function show(){
        $patients = Patient::all();
        return view('patient.appoinment', compact('patients'));
    }
    public function treatment($id){
        $patientId = Crypt::decrypt($id);
        $patient = Patient::find($patientId);
        return view('patient.treatment', compact('patient'));
    }
    public function treatments(Request $request){
        $patientID = Crypt::decrypt($request->patient_id);
        $patient = Patient::find($patientID);
        $treatment = new Treatment();
        $treatment->doctor_id = $patient->doctors->id;
        $treatment->patient_id = $patient->id;
        $treatment->treatment_description = $request->treatment_description;
        $treatment->additional_notes = $request->additional_notes;
        $treatment->check_in = now();
        $treatment->save();
        return redirect()->back()->with('success', 'Treatment and check-in time recorded.');
    }
   
}