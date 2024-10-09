<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Storage;

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
        $input['image'] = [$fileName];
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
            return 'no';
        }
    
    }
    public function show(){
        $doctors = Doctor::all();
        return view('doctor.list', compact('doctors'));
    }
}

