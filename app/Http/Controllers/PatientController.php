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
        $patient->check_in = now();
        $patient->save();
        return redirect()->route('patient.show');
    }
    public function show(){
        $patients = Patient::orderBy('appoinment_date', 'desc')->get();
        return view('patient.appoinment', compact('patients'));
    }
    
    public function edit($id){
        $patient = Patient::find(Crypt::decrypt($id));
        $doctors = Doctor::all();
        return view('patient.edit', compact('patient', 'doctors'));
    }
    public function update(PatientRequest $request){
        $patient = Patient::find(Crypt::decrypt($request->patient_id));
        $input = [
            'appoinment_date' => $request->date,
            'name' => $request->name,
            'age' => $request->age,
            'phone' => $request->phone,
            'email' => $request->email,
            'place' => $request->place,
            'house' => $request->house,
            'medical_history' => $request->medicalHistory,
            'doctor_id' => $request->doctor_id,
        ];
        $patient->update($input);
        $patient->save();
        return redirect()->route('patient.show');
    }
    public function destroy($id){
        $patient = Patient::find(Crypt::decrypt($id));
        $patient->delete();
        return redirect()->route('patient.view')->with('messege', $patient->name.'succefully deleted');
        
    }
   
}