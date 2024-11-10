<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\panelcontroller;
use App\Http\Controllers\landingpagecontroller;

// Administración
Route::get('panelinicio',[panelcontroller::class,'panelinicio'])->name('panelinicio');

// Landing Page
Route::get('inicio',[landingpagecontroller::class,'inicio'])->name('inicio');