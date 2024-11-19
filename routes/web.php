<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\panelcontroller;
use App\Http\Controllers\landingpagecontroller;

// ADMINISTRACIÓN
Route::get('panelinicio',[panelcontroller::class,'panelinicio'])->name('panelinicio');
Route::get('panelmenu',[panelcontroller::class,'panelmenu'])->name('panelmenu');
/* apartados */
Route::POST('crearapartado',[panelcontroller::class,'crearapartado'])->name('crearapartado');
Route::get('apartadoeditar/{id_apartado}',[panelcontroller::class,'apartadoeditar'])->name('apartadoeditar');

// Landing Page
Route::get('inicio',[landingpagecontroller::class,'inicio'])->name('inicio');
