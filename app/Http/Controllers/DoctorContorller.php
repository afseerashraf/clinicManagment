<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorLogin;
use App\Http\Requests\DoctorRequest;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use App\Models\Patient;
use App\Models\Treatment;
use App\Http\Requests\DoctorUpdate;
use Illuminate\View\View;

class DoctorContorller extends Controller
{
    public function index()
    {
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
       return redirect()->route('showDoctor.login');
    }

    public function doctorLogin(){
        return view('doctor.login');
    }


    public function login(DoctorLogin $request)
    {
        if(auth()->guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $doctor = auth()->guard('doctor')->user();
            $patients = $doctor->patients()->whereDoesntHave('treatment')->get(); // select the patients who not get treatment
            if(!$doctor->hasRole('doctor'))
            {
                $doctor->assignRole('doctor');
            }
            if(!$doctor->hasPermissionTo('patient_treatment'))
            {
                $doctor->givePermissionTo('patient_treatment');
            }
            return view('doctor.profile',  compact('doctor', 'patients'));
            
        }
        else
        {
            return redirect()->route('showDoctor.login');
        }
    
    }

    public function doctorProfile()
    {
        $doctor = auth()->guard('doctor')->user();

        $patients = $doctor->patients()->whereDoesntHave('treatment')->get(); // select the patients who not get treatment
        return view('doctor.profile', compact('doctor', 'patients'));
    }

    public function showDoctors()
    {
        $doctors = Doctor::all();
        return view('doctor.list', compact('doctors'));
    }
   
   
    public function treatment($id)
    {
        $patient = Patient::find(Crypt::decrypt($id));
        return view('patient.treatment', compact('patient'));
    }
   
    public function PatientTreatment(Request $request)
    {
        $patient  = Patient::find(Crypt::decrypt($request->patient_id));
        $treatment = new Treatment();
        $treatment->doctor_id = $patient->doctor->id;
        $treatment->patient_id = $patient->id;
        $treatment->treatment_description = $request->treatment_description;
        $treatment->additional_notes = $request->additional_notes;
  
        $treatment->save();

        return redirect()->route('doctor.profile')->with('done', 'successfully complete the treatment '.$patient->name);
    }

    public function delete($id)
    {
        $doctor = Doctor::find(Crypt::decrypt($id));
        $doctor->delete();
        return redirect()->route('doctor.show')->with('message', 'Successfully deleted '.$doctor->name);
    }
   
    public function viewupdate($id)
    {
        $doctor = Doctor::find(Crypt::decrypt($id));
        return view('doctor.update', compact('doctor'));
    }
   
    public function update(DoctorUpdate $request){
        $doctor = Doctor::find(Crypt::decrypt($request->id));
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'specialized' => $request->specialized,
        ];
        if($request->has('image')){
            $fileName = time().'_'.$request->image->getClientOriginalExtension();
            Storage::putFileAs('uploads/images', $request->image, $fileName);
            $input['image'] = $fileName;
        }
        $doctor->update($input);
        $doctor->save();
        return redirect()->route('doctor.show');
    }

    public function getPatient(Request $request){ //search patient
        $doctorId = Crypt::decrypt($request->doctor_id);
        $doctor = Doctor::find($doctorId);
        $patient = $doctor->patients()->where('name', 'like', '%' . $request->patientName . '%')->get();
        if ($patient->isNotEmpty()) {
            return view('doctor.patient', compact('patient'));
        } else {
            return view('doctor.patient', ['message' => 'No patient found.']);
        }
        
    }
   
   
    public function logout($id){
        $doctor = Doctor::find(Crypt::decrypt($id));
        auth()->guard('doctor')->logout();
        return redirect()->route('showDoctor.login');
        
    }
    

    
}

