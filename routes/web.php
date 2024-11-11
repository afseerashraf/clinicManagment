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
use App\Http\Middleware\AdminOrReceptionist;
use App\Http\Controllers\userController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('/', 'index')->name('showAdmin.register');
    Route::post('register', 'register')->name('admin.register');
    Route::get('login', 'adminLogin')->name('showAdmin.login');
    Route::post('dologin', 'login')->name('admin.login');
    Route::group(['middleware' => ['auth:admin','permission:manage users']], function () {
        Route::get('dashboard', 'dashoard')->name('admin.dashboard'); // admin can handle the all users.
        Route::get('logout/{id}', 'logout')->name('admin.logout');
    });
    Route::get('forget', 'viewsendEmail')->name('viewsendEmail');
    Route::post('passwordreset', 'sendPasswordResetMail')->name('sendPasswordResetMail');
    Route::get('viewreset/{token}', 'viewResetForm')->name('viewResetForm');
});
Route::prefix('doctor')->controller(DoctorContorller::class)->group(function () {
    Route::get('doctor', 'index')->name('doctor.index');
    Route::post('register', 'register')->name('doctor.register');
    Route::get('login', 'doctorLogin')->name('showDoctor.login');
    Route::post('dologin', 'login')->name('doctor.doLogin');
    Route::get('show', 'showDoctors')->name('doctor.show')->middleware(['auth:admin','permission:manage users']); // it show all the registered doctors.
    Route::get('treatment/{id}', 'treatment')->name('doctor.treatment'); // this route is doctor treatment section doctor can only access.
    Route::post('treatments', 'treatments')->name('treatment');
    Route::get('delete/{id}', 'delete')->name('delete.doctor');
    Route::get('getpatient', 'getPatient')->name('getPatient');
    Route::get('edit/{id}', 'viewupdate')->name('edit.doctor');
    Route::post('update', 'update')->name('update');
    Route::get('logout/{id}', 'logout')->name('doctor.logout');
});
Route::prefix('receptionist')->controller(ReceptionistController::class)->group(function () {
    Route::get('index', 'index')->name('receptionist.index');
    Route::post('register', 'register')->name('receptionist.register');
    Route::get('login', 'receptionistLogin')->name('showReceptionist.login');
    Route::post('dologin', 'login')->name('receptionist.dologin');
    Route::get('profile', 'profile')->name('receptionist.profile')->middleware('auth:receptionist');
    Route::get('show', 'show')->name('receptionist.show')->middleware(['auth:admin','permission:manage users']); //it show the all registered receptionist only admin can access this route.
    Route::get('logout/{id}', 'logout')->name('receptionist.logout');
    Route::get('delete/{id}', 'delete')->name('delete.receptionist');
});

Route::group(['middleware' => ['auth:receptionist','permission:manage_patients']], function () {
    Route::prefix('patient')->controller(PatientController::class)->group(function () {
        Route::get('patient', 'index')->name('patient.index');
        Route::post('register', 'register')->name('patient.register');
        Route::get('patients', 'show')->name('patient.show');
        Route::get('edit/{id}', 'edit')->name('patient.edit');
        Route::post('update', 'update')->name('patient.update');
        Route::get('delete/{id}', 'destroy')->name('patient.delete');
    });

    Route::prefix('treatment')->controller(TreatmentController::class)->group(function () {
        Route::get('list', 'unpaidPatients')->name('unpaid.patients')->middleware(['auth:receptionist', 'role:receptionist']); // it show all unpaid patients admin can only access this route
        Route::get('delete/{id}', 'destroyPatient')->name('treatment.delete');
        Route::get('bill/{id}', 'bill')->name('treatment_bill');
    });
    Route::prefix('bill')->controller(PatientbillsController::class)->group(function () {
        Route::post('paybill', 'payBill')->name('bill.pay');
        Route::get('paidPatients', 'paidPatients')->name('show.paidPatients')->middleware(['auth:receptionist', 'role:receptionist']);
        Route::get('paydbill', 'paydbill')->name('paydbill');
        Route::get('download/{id}', 'downloadPdf')->name('bill.download');
    });
});


