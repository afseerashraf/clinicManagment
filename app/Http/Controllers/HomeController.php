<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;


class HomeController extends Controller
{
    public function home()
    {
        $doctors = Doctor::all();

        return view('home', compact('doctors'));
    }

    public function appointment(Request $request)
    {
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

        return redirect()->back();
    }
}
