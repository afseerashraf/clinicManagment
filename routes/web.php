<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

    Route::prefix('admin')->controller(AdminController::class)->group(function(){
        Route::get('admin', 'index')->name('register');
        Route::post('register', 'register')->name('admin.register');
        Route::get('login', 'adminLogin')->name('login');
        Route::post('login', 'login')->name('admin.login');
    });
