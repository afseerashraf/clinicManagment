<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecepitionistLogin;
use Illuminate\Http\Request;
use App\Http\Requests\ReceptionistRequest;
use App\Models\Receptionist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\Receptionist\ReceptionistForgotPassword;
use App\Http\Requests\Receptionist\forgotPasswordEmail;


class ReceptionistController extends Controller
{
    public function index()
    {
        return view('receptionist.register');
    }
    public function register(ReceptionistRequest $request)
    {
        $receptionist = new Receptionist();
        $receptionist->name = $request->name;
        $receptionist->email = $request->email;
        $receptionist->place = $request->place;
        $receptionist->phone = $request->phone;
        $receptionist->password = $request->password;
        $receptionist->save();

        return redirect()->route('showReceptionist.login');
    }

    public function receptionistLogin()
    {
        return view('receptionist.login');
    }
    public function login(RecepitionistLogin $request)
    {
        $credentials = $request->only('email', 'password');
        if(auth()->guard('receptionist')->attempt($credentials))
        {
           $receptionist = auth()->guard('receptionist')->user();
           if(!$receptionist->hasRole('receptionist'))
           {
            $receptionist->assignRole('receptionist');
           }
           if(!$receptionist->hasPermissionTo('manage_patients'))
           {
            $receptionist->givePermissionTo('manage_patients');
           }
           return view('receptionist.profile', compact('receptionist'));
        }
        else
        {
            return redirect()->back()->with('message', 'Does not find the user');
        }
    }

    public function profile()
    {
        $receptionist = auth()->guard('receptionist')->user();
        return view('receptionist.profile', compact('receptionist'));
    }

    public function show()
    {
        $receptionists = Receptionist::all();
        return view('receptionist.list', compact('receptionists'));
    }

   
    public function logout($id)
    {
        $receptionist = Receptionist::find(Crypt::decrypt($id));
        auth()->guard('receptionist')->logout();
        return redirect()->route('showReceptionist.login');
    }
    public function delete($id)
    {
        $receptionist = Receptionist::find(Crypt::decrypt($id));
        $receptionist->delete();
        return redirect()->route('receptionist.show');
    }

    public function MailforLink()
    {
        return view('Receptionist.ForgotPassword.mail_id');
    }

    public function sendLink(forgotPasswordEmail $request)
    {
       
        $receptionist = Receptionist::where('email', '=', $request->email)->first();
        if($receptionist){
          $token = Str::random(64);
         
          $receptionist->password_reset_token = $token;
          $receptionist->save();

          Mail::to($receptionist->email)->send(new ReceptionistForgotPassword($receptionist, $token));
          return redirect()->back()->with('message', 'Password reset link sent to your email!');

        }
        else
        {
            return redirect()->route('showReceptionist.login')->with('message', " Server Doesn't find the user ");
        }
    }

    public function viewResetPage($token)
    {
        $receptionist = Receptionist::where('password_reset_token', '=', $token)->first();

        if($receptionist)
        {
            $receptionist->password_reset_token = 'null';
            $receptionist->save();
            return view('receptionist.ForgotPassword.resetPassword', compact('receptionist'));
        }
        else
        {
            return redirect()->route('showReceptionist.login')->with('message', 'No Valid User');
        }
       
    }

    public function resetedPassword(Request $request)
    {
        $request->validate([
            'receptionist_id' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
        $receptionist = Receptionist::find(Crypt::decrypt($request->receptionist_id));
        if($receptionist){

            $receptionist->update([
                'password' => $request->password,
            ]);
    
            toastr()->success($receptionist->name.' successfully reseted password!');
    
            return redirect()->route('showReceptionist.login');
    
        }
        else
        {
            return redirect()->route('receptionist.sendMail')->with('message', 'Token is expired');
        }
     
        
    }

    public function session(Request $request)
    {
        
        $data = $request->session()->all();

        return $data;
    }

}
