<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
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
    public function patients(){
        $patients = Patient::all();
        return view('patient.appoinment', compact('patients'));
    }
}
