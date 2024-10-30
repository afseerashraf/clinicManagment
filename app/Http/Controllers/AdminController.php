<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\Doctor;

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
        return redirect()->route('login');
    }
    public function adminLogin(){
        return view('admin.login');
    }
    public function login(AdminRequest $request){
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if(auth()->guard('admin')->attempt($credentials)){
            $admin = auth()->guard('admin')->user();
            if(!$admin->hasRole('admin')){
                $admin->assignRole('admin');
            }if(!$admin->hasPermissionTo('manage users')){
                $admin->givePermissionTo('manage users');
            }
           return view('admin.dashboard', compact('admin'));
        }else{
           return redirect()->route('showAdmin.login');
        }

    }
    public function dashoard(){
        $admin = Admin::find(1);
        if(!$admin->hasRole('admin')){
            $admin->assignRole('admin');
        }if(!$admin->hasPermissionTo('manage users')){
            $admin->givePermissionTo('manage users');
        }
        return view('admin.dashboard', compact('admin'));
        
        
    }
  

    public function logout($id){
        $admin = Admin::find(Crypt::decrypt($id));
        auth()->guard('admin')->logout();
        return redirect()->route('showAdmin.login');
    }
}
