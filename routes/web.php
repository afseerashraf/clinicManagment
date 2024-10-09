<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorContorller;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Middleware\Receptionist;
Route::get('/', function () {
    return view('welcome');
});

    Route::prefix('admin')->controller(AdminController::class)->group(function(){
        Route::get('admin', 'index')->name('register');
        Route::post('register', 'register')->name('admin.register');
        Route::get('login', 'adminLogin')->name('admin.login');
        Route::post('login', 'login')->name('admin.login');
        Route::get('dashboard', 'dashoard')->name('admin.dashboard');
    });

    Route::prefix('doctor')->controller(DoctorContorller::class)->group(function(){
        Route::get('doctor', 'index')->name('doctor.index');
        Route::post('register', 'register')->name('doctor.register');
        Route::get('login', 'doctorLogin')->name('doctor.login');
        Route::post('dologin', 'login')->name('doctor.doLogin');
        Route::get('profile', 'profile')->name('doctor.profile')->middleware('auth:doctor');
        Route::get('show', 'show')->name('doctor.show');//this route only access the admin
    }); 
    Route::prefix('receptionist')->controller(ReceptionistController::class)->group(function(){
        Route::get('index', 'index')->name('receptionist.index');
        Route::post('register', 'register')->name('receptionist.register');
        Route::get('login', 'receptionistLogin')->name('receptionist.login');
        Route::post('dologin', 'login')->name('receptionist.dologin');
        Route::get('show', 'show')->name('receptionist.show');
       
     });
    
        Route::get('hellow', function(){
            return view('admin.dashboard');
        })->name('hellow');
   
   

Route::prefix('patient')->controller(PatientController::class)->group(function(){
    Route::get('patient', 'index')->name('patient.index'); // access the receptionist
    Route::post('register', 'register')->name('patient.register'); //patient registration assign specialized doctors
    Route::get('patients', 'show')->name('pateint.view'); // only admin can access the route
});

