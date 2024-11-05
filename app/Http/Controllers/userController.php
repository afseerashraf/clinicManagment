<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function userlogin(Request $request){
      $credential = (['email' => $request->email, 'password' => $request->password]);
      if(Auth::attempt($credential)){
        return 'success';
      }else{
        return 'no';
      }
    }
}
