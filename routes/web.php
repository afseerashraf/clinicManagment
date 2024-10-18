<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorContorller;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Middleware\Receptionist;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\billController;
use App\Http\Controllers\PatientbillsController;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use App\Models\Treatment;
Route::get('/', function () {
    return 'clinic';
});

Route::prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('/', 'index')->name('showAdmin.register');
    Route::post('register', 'register')->name('admin.register');
    Route::get('login', 'adminLogin')->name('ashowAdmin.login');
    Route::post('login', 'login')->name('admin.login');
   // Route::middleware('auth:admin')->group(function(){
        Route::get('dashboard', 'dashoard')->name('admin.dashboard'); // admin can handle the all users.
        Route::post('logout/{id}', 'logout')->name('admin.logout');
    //});
    
});

Route::prefix('doctor')->controller(DoctorContorller::class)->group(function () {
    Route::get('doctor', 'index')->name('doctor.index');
    Route::post('register', 'register')->name('doctor.register');
    Route::get('login', 'doctorLogin')->name('showDoctor.login');
    Route::post('dologin', 'login')->name('doctor.doLogin');
    //Route::middleware('auth:admin')->group(function(){
        Route::get('profile', 'profile')->name('doctor.profile')->withoutMiddleware('auth:admin'); // doctor can only allow to access this route.
        Route::get('show', 'show')->name('doctor.show'); // it show all the registered doctors this route only access the admin.
        Route::get('delete/{id}', 'delete')->name('delete.doctor');
        Route::post('patient', 'getPatient')->name('getPatient');
    });
    
   // });
    

Route::prefix('receptionist')->controller(ReceptionistController::class)->group(function () {
    Route::get('index', 'index')->name('receptionist.index');
    Route::post('register', 'register')->name('receptionist.register');
    Route::get('login', 'receptionistLogin')->name('showReceptionist.login');
    Route::post('dologin', 'login')->name('receptionist.dologin');
    Route::get('show', 'show')->name('receptionist.show'); //it show the all registered receptionist only admin can access this route.

});

Route::get('hellow', function () {
    return view('admin.dashboard');
})->name('hellow');

Route::prefix('patient')->controller(PatientController::class)->group(function () {
    Route::get('patient', 'index')->name('patient.index'); // it register patient this route only access the admin and receptionist can only access this route.
    Route::post('register', 'register')->name('patient.register'); //patient registration assign specialized doctors.
    Route::get('patients', 'show')->name('patient.view'); // it show all patients only admin can allow to access this route.
    Route::get('treatment/{id}', 'treatment')->name('doctor.treatment'); // this route is doctro treatment section doctor can only access.
    Route::post('treatments', 'treatments')->name('treatment');
    Route::get('edit/{id}', 'edit')->name('patient.edit');
    Route::post('update', 'update')->name('patient.update');
    Route::get('delete/{id}', 'destroy')->name('patient.delete');
});
Route::prefix('treatment')->controller(TreatmentController::class)->group(function () {
    Route::get('list', 'unpaidPatients')->name('unpaid.patients'); // it show all unpaid patients admin can only access this route
    Route::get('delete/{id}', 'destroyPatient')->name('treatment.delete');
    Route::get('bill/{id}', 'bill' )->name('treatment_bill');
});

Route::prefix('bill')->controller(PatientbillsController::class)->group(function(){
    Route::post('paybill', 'payBill')->name('bill.pay');
    Route::get('paidPatients', 'paidPatients')->name('show.paidPatients');

});



