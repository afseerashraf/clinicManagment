<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReceptionistRequesr;
class ReceptionistController extends Controller
{
    public function index(){
        return view('receptionist.register');
    }
    public function register(ReceptionistRequesr $request){

    }
}
