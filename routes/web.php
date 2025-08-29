<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Site;
use App\Http\Controllers\AuthCtrl;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\PatientManager;

Route::get('/', [Site::class, 'home'])->name('home');
Route::get('/login', [Site::class, 'login'])->name('login');
Route::get('/create', [Site::class, 'create'])->name('create');
Route::post('/login/post', [AuthCtrl::class,'login'])->name('login.post');
Route::post('/create/post', [PatientManager::class,'create'])->name('create.post');

Route::middleware(['auth:web'])->group(function(){
    Route::get('/dashboard/dashboard', [Dashboard::class, 'dashboard'])->name('dashboard');

    Route::get('/logout', [AuthCtrl::class, 'logout'])->name('logout');

    Route::get('/patient/view', [PatientManager::class,'view'])->name('patient.view');

});