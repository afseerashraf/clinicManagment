<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorLogin;
use App\Http\Requests\DoctorRequest;
use App\Http\Requests\DoctorUpdate;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\Doctor\DoctorPasswordResetMail;

class DoctorContorller extends Controller
{

    public function register(DoctorRequest $request)
    {
        $input = [
            'name' => $request->name,

            'email' => $request->email,

            'phone' => $request->phone,

            'specialized' => $request->specialized,

            'password' => $request->password,
        ];

        if ($request->hasfile('image')) {

            $fileName = time().'.'.$request->image->getClientOriginalExtension();

            Storage::putFileAs('uploads/doctor/images', $request->image, $fileName);

            $input['image'] = $fileName;
        }
        $doctor = Doctor::create($input);

        return redirect()->route('showDoctor.login');
    }



    public function login(DoctorLogin $request)
    {
        if (auth()->guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])) {

            $doctor = auth()->guard('doctor')->user();

            $patients = $doctor->patients()->whereDoesntHave('treatment')->get(); // select the patients who not get treatment

            if (! $doctor->hasRole('doctor')) {

                $doctor->assignRole('doctor');
            }

            if (! $doctor->hasPermissionTo('patient_treatment')) {

                $doctor->givePermissionTo('patient_treatment');
            }

            return view('doctor.profile', compact('doctor', 'patients'));

        } else {

            return redirect()->route('showDoctor.login');
        }

    }

    public function doctorProfile()
    {
        $doctor = auth()->guard('doctor')->user();

        $patients = $doctor->patients()->whereDoesntHave('treatment')->get(); // select the patients who not get treatment

        return view('doctor.profile', compact('doctor', 'patients'));
    }

    public function showDoctors(Request $request)
    {
        $doctors = Doctor::all();

        return view('doctor.list', compact('doctors'));

        // if($request->ajax()) {
        //     $doctors = Doctor::all();

        //     return DataTables::of($doctors)
        //     ->addIndexColumn()
        //     ->addColumn('action', function ($doctor) {

        //        return '<button data-id="'. $doctor->id. '" class btn> Delete </button>';


        //     })

        //     ->rawColumns(['action'])
        //     ->make(true);
        // }
        //     return view('doctor.list');
        }


    public function treatment($id)
    {
        $patient = Patient::find(Crypt::decrypt($id));

        return view('patient.treatment', compact('patient'));
    }

    public function PatientTreatment(Request $request)
    {

        $patient = Patient::find(Crypt::decrypt($request->patient_id));

        $treatment = new Treatment;

        $treatment->doctor_id = $patient->doctor->id;

        $treatment->patient_id = $patient->id;

        $treatment->treatment_description = $request->treatment_description;

        if($request->additional_notes)
        {

            $treatment->additional_notes = $request->additional_notes;

        }

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

    public function update(DoctorUpdate $request)
    {
        $doctor = Doctor::find(Crypt::decrypt($request->id));

        $input = [
            'name' => $request->name,

            'email' => $request->email,

            'phone' => $request->phone,

            'specialized' => $request->specialized,
        ];
        if ($request->has('image')) {

            $fileName = time().'_'.$request->image->getClientOriginalExtension();

            Storage::putFileAs('uploads/images', $request->image, $fileName);

            $input['image'] = $fileName;
        }
        $doctor->update($input);

        $doctor->save();

        return redirect()->route('doctor.show');
    }

    public function getPatient(Request $request) // search patient
    {
        $doctorId = Crypt::decrypt($request->doctor_id);

        $doctor = Doctor::find($doctorId);

        $patient = $doctor->patients()->where('name', 'like', '%'.$request->patientName.'%')->get();

        if ($patient->isNotEmpty()) {

            return view('doctor.patient', compact('patient'));

        } else {

            return view('doctor.patient', ['message' => 'No patient found.']);
        }

    }

// Doctor chat with online cunsult patient
public function chatPatient($id)
{
    $patient_ID = Crypt::decrypt($id);

    $patient = Patient::findOrFail($patient_ID);

    if($patient)
    {
        return view('doctor.chatPatient', compact('patient'));
    }else {

        return redirect()->back()->with('messege', 'Can not find Online cunsult Patient');
    }


}





    public function logout($id)
    {
        $doctor = Doctor::find(Crypt::decrypt($id));

        auth()->guard('doctor')->logout();

        return redirect()->route('showDoctor.login');

    }


    public function sendPasswordResetMail(Request $request)
    {

         $request->validate([

            'email' => 'required',

            'email',

            'exists:doctors',
        ]);

        $checkMail = Doctor::where('email', $request->email)->first();

        if($checkMail)
        {
            $token = str::random(64);

            $checkMail->password_reset_token = $token;

            $checkMail->save();

            Mail::to($checkMail->email)->send(new DoctorPasswordResetMail($checkMail, $token));

            return redirect()->back()->with('message', 'Password reset link sent to your email!');

     } else {
            return redirect()->back();
        }




    }

    public function viewResetForm($token)
    {
        $doctor = Doctor::where('password_reset_token', $token)->first();

        if($doctor)
        {
            $doctor->password_reset_token = 'null';

            $doctor->save();

            return view('doctor.resetPasswordForm', compact('doctor'));
        } else {
            return redirect()->route('showDoctor.login');
        }
    }

    public function resetPassword(Request $request)
    {
       $request->validate([

            'doctor_id' => 'required',

            'password' => 'required|min:8|confirmed',

        ]);

        $doctor = Doctor::find(Crypt::decrypt($request->doctor_id));

        if($doctor)
        {
            $doctor->update([
                'password' => $request->password,
            ]);

            return redirect()->route('showDoctor.login');

            toastr()->success("Successfully update you'r password" );

        }else{

            return redirect()->route('doctor.doctorForgotPassword');
        }
    }





}
