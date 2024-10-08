<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorContorller;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReceptionistController;
Route::get('/', function () {
    return view('welcome');
});

    Route::prefix('admin')->controller(AdminController::class)->group(function(){
        Route::get('admin', 'index')->name('register');
        Route::post('register', 'register')->name('admin.register');
        Route::get('login', 'adminLogin')->name('login');
        Route::post('login', 'login')->name('admin.login');
    });

    Route::prefix('doctor')->controller(DoctorContorller::class)->group(function(){
        Route::get('doctor', 'index')->name('doctor.index');
        Route::post('register', 'register')->name('doctor.register');
        Route::get('login', 'doctorLogin')->name('doctor.login');
        Route::post('dologin', 'login')->name('doctor.doLogin');
        Route::get('profile', 'profile')->name('doctor.profile');
    });
    Route::prefix('receptionist')->controller(ReceptionistController::class)->group(function(){
        Route::get('index', 'index')->name('index');
        Route::post('register', 'register')->name('receptionist.register');
    });

Route::prefix('patient')->controller(PatientController::class)->group(function(){
    Route::get('patient', 'index')->name('patient.index');
    Route::post('register', 'register')->name('patient.register'); //patient registration assign specialized doctors
    Route::get('patients', 'patients')->name('pateint.view');
});

