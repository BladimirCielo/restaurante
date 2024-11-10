<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\panelcontroller;
use App\Http\Controllers\landingpagecontroller;

// Administración
Route::get('panelinicio',[panelcontroller::class,'panelinicio'])->name('panelinicio');
Route::get('panelmenu',[panelcontroller::class,'panelmenu'])->name('panelmenu');

// Landing Page
Route::get('inicio',[landingpagecontroller::class,'inicio'])->name('inicio');