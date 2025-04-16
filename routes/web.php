<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Debug;


Route::get('/', [Debug::class, 'index'])->name('home');