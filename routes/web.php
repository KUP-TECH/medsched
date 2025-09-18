<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Site;
use App\Http\Controllers\AuthCtrl;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\PatientManager;
use App\Http\Controllers\Appointments;
use App\Http\Controllers\ClinicServices;

Route::get('/', [Site::class, 'home'])->name('home');
Route::get('/login', [Site::class, 'login'])->name('login');
Route::get('/create', [Site::class, 'create'])->name('create');
Route::post('/login/post', [AuthCtrl::class,'login'])->name('login.post');
Route::post('/create/post', [PatientManager::class,'create'])->name('create.post');

Route::middleware(['auth:web'])->group(function(){
    Route::get('/dashboard/dashboard', [Dashboard::class, 'dashboard'])->name('dashboard');

    Route::get('/logout', [AuthCtrl::class, 'logout'])->name('logout');

    Route::get('/patient/view', [PatientManager::class,'view'])->name('patient.view');
    Route::get('/client/appointment/view', [Appointments::class,'patient_view'])->name('patient_view');
    Route::post('/client/appointment/view/create', [Appointments::class,'create_appointment'])->name('create_appointment');
    Route::get('/client/appointment/staff_view', [Appointments::class,'staff_view'])->name('staff_view');
    Route::post('/client/appointment/schedule', [Appointments::class,'schedule_appoinment'])->name('schedule_appoinment');

    Route::get('/clinic/clinic_services', [ClinicServices::class,'clinic_services'])->name('clinic_services');
    Route::post('/clinic/create_service', [ClinicServices::class,'create_service'])->name('create_service');

});