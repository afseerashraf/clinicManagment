<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorContorller;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Middleware\Receptionist;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\billController;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use App\Models\Treatment;
Route::get('/', function () {
    return 'clinic';
});

Route::prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('admin', 'index')->name('register');
    Route::post('register', 'register')->name('admin.register');
    Route::get('login', 'adminLogin')->name('admin.login');
    Route::post('login', 'login')->name('admin.login');
    Route::get('dashboard', 'dashoard')->name('admin.dashboard'); // admin can handle the all users.
});

Route::prefix('doctor')->controller(DoctorContorller::class)->group(function () {
    Route::get('doctor', 'index')->name('doctor.index');
    Route::post('register', 'register')->name('doctor.register');
    Route::get('login', 'doctorLogin')->name('doctor.login');
    Route::post('dologin', 'login')->name('doctor.doLogin');
    Route::get('profile', 'profile')->name('doctor.profile'); // doctor can only allow to access this route.
    Route::get('show', 'show')->name('doctor.show'); // it show all the registered doctors this route only access the admin.
    Route::get('delete/{id}', 'delete')->name('delete.doctor');
});
Route::prefix('receptionist')->controller(ReceptionistController::class)->group(function () {
    Route::get('index', 'index')->name('receptionist.index');
    Route::post('register', 'register')->name('receptionist.register');
    Route::get('login', 'receptionistLogin')->name('receptionist.login');
    Route::post('dologin', 'login')->name('receptionist.dologin');
    Route::get('show', 'show')->name('receptionist.show'); //it show the all registered receptionist only admin can access this route.

});

Route::get('hellow', function () {
    return view('admin.dashboard');
})->name('hellow');

Route::prefix('patient')->controller(PatientController::class)->group(function () {
    Route::get('patient', 'index')->name('patient.index'); // it register patient this route only access the admin and receptionist can only access this route.
    Route::post('register', 'register')->name('patient.register'); //patient registration assign specialized doctors.
    Route::get('patients', 'show')->name('pateint.view'); // it show all patients only admin can allow to access this route.
    Route::get('treatment/{id}', 'treatment')->name('doctor.treatment'); // this route is doctro treatment section doctor can only access.
    Route::post('treatments', 'treatments')->name('treatment');
});
Route::prefix('treatment')->controller(TreatmentController::class)->group(function () {
    Route::get('list', 'patientsTreatment')->name('patients.treatment'); // it show all treatment taken patietns admin can only access this route
});

// Route::prefix('bill')->controller(billController::class)->group(function(){
//     Route::get('treatment', function(){
//         $treatment = Treatment::find(2);
//         return view('receptionist.treatmentBill', compact('treatment'));
//     });
//     Route::post('paybill', 'payBill')->name('bill.pay');
    
// });

