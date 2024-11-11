<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLogin;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Mail\AdminPasswordResetMail;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\Doctor;
use App\Models\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin.register');
    }
    public function register(AdminRequest $request){
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = $request->password;
        $admin->save();
        return redirect()->route('showAdmin.login');
    }
    public function adminLogin(){
        return view('admin.login');
    }
    public function login(AdminLogin $request){
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if(auth()->guard('admin')->attempt($credentials)){
            $admin = auth()->guard('admin')->user();
            if(!$admin->hasRole('admin')){
                $admin->assignRole('admin');
            }if(!$admin->hasPermissionTo('manage users')){
                $admin->givePermissionTo('manage users');
            }
            session(['admin' => $admin]);
           return view('admin.dashboard', compact('admin'));
           
        }else{
           return redirect()->route('showAdmin.login');
        }

    }
    public function dashoard(){
        return view('admin.dashboard');
        
    }
    public function logout($id){
        $admin = Admin::find(Crypt::decrypt($id));
        auth()->guard('admin')->logout();
        return redirect()->route('showAdmin.login');
    }
    public function viewsendEmail(){
        return view('admin.forgotEmail');
    }
    public function sendPasswordResetMail(Request $request){
        $request->validate([
            'email' => 'required', 'email', 'exists:admins',
        ]);
        $admin = Admin::where('email', $request->email)->first();
       
        if($admin){ 
            
            $token = str::random(64);
            $admin->update([
                'password_reset_token' => $token,
            ]);
           $admin->save();
           
           Mail::to($admin->email)->send(new AdminPasswordResetMail($admin, $token));

        }else{
            return redirect()->route('showAdmin.login');
        }
    }
    public function viewResetForm($token){
       
        $admin = Admin::where('password_reset_token', $token)->first();
        
        if($admin){
            
            return view('admin.resetPasswordForm');
        }else{
            return redirect()->route('showAdmin.login');
        }
    }
}
