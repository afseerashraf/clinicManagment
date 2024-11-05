<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecepitionistLogin;
use Illuminate\Http\Request;
use App\Http\Requests\ReceptionistRequest;
use App\Models\Receptionist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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
    public function login(RecepitionistLogin $request){
        $credentials = $request->only('email', 'password');
        if(auth()->guard('receptionist')->attempt($credentials)){
           $receptionist = auth()->guard('receptionist')->user();
           if(!$receptionist->hasRole('receptionist')){
            $receptionist->assignRole('receptionist');
           }if(!$receptionist->hasPermissionTo('manage_patients')){
            $receptionist->givePermissionTo('manage_patients');
           }
           session(['receptionist' => $receptionist]);
           return view('receptionist.profile', compact('receptionist'));
        }else{
            return "Dos not find the user! please register";
        }
    }

    public function show(){
        $receptionists = Receptionist::all();
        return view('receptionist.list', compact('receptionists'));
    }

    public function profile(){
        return view('receptionist.profile');
    }
    public function logout($id){
        $receptionist = Receptionist::find(Crypt::decrypt($id));
        auth()->guard('receptionist')->logout();
        return redirect()->route('showReceptionist.login');
    }
    public function delete($id){
        $receptionist = Receptionist::find(Crypt::decrypt($id));
        $receptionist->delete();
        return redirect()->route('receptionist.show');
    }

}
