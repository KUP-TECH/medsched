<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Site;
use App\Http\Controllers\AuthCtrl;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\PatientManager;
use App\Http\Controllers\Appointments;
use App\Http\Controllers\ClinicServices;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\MedicalRecords;
Route::get('/', [Site::class, 'home'])->name('home');
Route::get('/login', [Site::class, 'login'])->name('login');
Route::get('/create', [Site::class, 'create'])->name('create');
Route::post('/login/post', [AuthCtrl::class,'login'])->name('login.post');
Route::post('/create/post', [PatientManager::class,'create'])->name('create.post');

Route::middleware(['auth:web'])->group(function(){
    Route::get('/dashboard/dashboard', [Dashboard::class, 'dashboard'])->name('dashboard');


    Route::get('/site/verify_token_view', [Site::class, 'verify_token_view'])->name('verify_token_view');
    Route::get('/site/resend_token', [Site::class, 'resend_token'])->name('resend_token');
    Route::post('/site/verify_token', [Site::class, 'verify_token'])->name('verify_token');

    Route::get('/logout', [AuthCtrl::class, 'logout'])->name('logout');

    Route::get('/patient/view', [PatientManager::class,'view'])->name('patient.view');
    Route::get('/client/appointment/view', [Appointments::class,'patient_view'])->name('patient_view');
    Route::post('/client/appointment/view/create', [Appointments::class,'create_appointment'])->name('create_appointment');
    Route::get('/client/appointment/staff_view', [Appointments::class,'staff_view'])->name('staff_view');
    Route::post('/client/appointment/schedule', [Appointments::class,'schedule_appoinment'])->name('schedule_appoinment');

    Route::get('/clinic/clinic_services', [ClinicServices::class,'clinic_services'])->name('clinic_services');
    Route::post('/clinic/create_service', [ClinicServices::class,'create_service'])->name('create_service');
    Route::post('/clinic/delete_service', [ClinicServices::class,'delete_service'])->name('delete_service');
    


    Route::get('/client/staff/view', [StaffController::class,'staff'])->name('staff');
    Route::post('/client/staff/create_staff', [StaffController::class,'create_staff'])->name('create_staff');
    Route::post('/client/staff/delete_staff', [StaffController::class,'delete_staff'])->name('delete_staff');


    Route::get('/client/medical_records/view', [MedicalRecords::class,'medical_records'])->name('medical_records');

    Route::get('/client/medical_records/download', [MedicalRecords::class,'download_pdf'])->name('download_pdf');
    Route::get('/patient/medical_records/profile', [MedicalRecords::class,'profile'])->name('profile');

    

    Route::get('/appointments/get_scheduled_appointments', [Appointments::class, 'get_scheduled_appointments'])->name('get_scheduled_appointments');
});