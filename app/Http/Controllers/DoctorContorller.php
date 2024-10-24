<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use App\Models\Patient;
use App\Models\Treatment;
class DoctorContorller extends Controller
{
    public function index(){
        return view('Doctor.register');
    }
    public function register(DoctorRequest $request){
       $input = [
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'specialized' => $request->specialized,
        'password' => $request->password,
       ];
       if($request->hasfile('image')){
        $fileName = time().'_'.$request->image->getClientOriginalExtension();
        Storage::putFileAs('uploads/images', $request->image, $fileName);
        $input['image'] = $fileName;
       }
       $doctor = Doctor::create($input);
       return redirect()->route('doctor.login');
    }

    public function doctorLogin(){
        return view('doctor.login');
    }
    public function login(DoctorRequest $request){
        $credentials = $request->only('email', 'password');
        if(auth()->guard('doctor')->attempt($credentials)){
            $doctor = auth()->guard('doctor')->user();
            return view('doctor.profile', compact('doctor'));
        }else{
            return redirect()->route('showDoctor.login');
        }
    
    }

    public function profile(){
        $doctor = Doctor::find(7);
        $patients = $doctor->patients()->whereDoesntHave('treatment')->get(); // select the patients who not get treatment
        return view('doctor.profile', compact('doctor', 'patients'));
    }
    public function showDoctors(){
        $doctors = Doctor::all();
        return view('doctor.list', compact('doctors'));
    }
    public function treatment($id){
        $patientId = Crypt::decrypt($id);
        $patient = Patient::find($patientId);
        return view('patient.treatment', compact('patient'));
    }
    public function treatments(Request $request){
        $patient = Patient::find(Crypt::decrypt($request->patient_id));
        $treatment = new Treatment();
        $treatment->doctor_id = $patient->doctor->id;
        $treatment->patient_id = $patient->id;
        $treatment->treatment_description = $request->treatment_description;
        $treatment->additional_notes = $request->additional_notes;
        $treatment->check_in = now();
        $treatment->save();
        return redirect()->route('doctor.profile', compact('patient'));
    }

    public function delete($id){
        $doctor = Doctor::find(Crypt::decrypt($id));
        $doctor->delete();
        return redirect()->route('doctor.show');
    }
    public function getPatient(DoctorRequest $request){ //search bar function
        $doctorId = Crypt::decrypt($request->doctor_id);
        $doctor = Doctor::find($doctorId);
        $patient = $doctor->patients()->where('name', '=', $request->patientName)->get();
        return view('doctor.patient', compact('patient'));
    }
    

    
}

