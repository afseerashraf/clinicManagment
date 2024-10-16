<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReceptionistRequest;
use App\Models\Receptionist;
use Illuminate\Support\Facades\Auth;

class ReceptionistController extends Controller
{
    public function index(){
        return view('receptionist.register');
    }
    public function register(ReceptionistRequest $request){
        $receptionist = new Receptionist();
        $receptionist->name = $request->name;
        $receptionist->email = $request->email;
        $receptionist->place = $request->place;
        $receptionist->phone = $request->phone;
        $receptionist->password = $request->password;
        $receptionist->save();

        return redirect()->route('receptionist.login');
    }

    public function receptionistLogin(){
        return view('receptionist.login');
    }
    public function login(ReceptionistRequest $request){
        $credentials = $request->only('email', 'password');
        if(auth()->guard('recetionist')->attempt($credentials)){
           $receptionist = auth()->guard('recetionist')->user();
           return view('receptionist.profile', compact('receptionist'));
        }else{
            return "$credentials wrong";
        }
    }

    public function show(){
        $receptionists = Receptionist::all();
        return view('receptionist.list', compact('receptionists'));
    }
}
