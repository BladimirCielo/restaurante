<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\panelcontroller;
use App\Http\Controllers\pedidoscontroller;
use App\Http\Controllers\landingpagecontroller;
use App\Http\Controllers\logincontroller;

/* LOGIN */
Route::get('inicio',[logincontroller::class,'inicio'])->name('inicio');
Route::get('login',[logincontroller::class,'login'])->name('login');
Route::POST('validar',[logincontroller::class,'validar'])->name('validar');
Route::get('cerrarsesion',[logincontroller::class,'cerrarsesion'])->name('cerrarsesion');
// ADMINISTRACIÓN
Route::get('panelinicio',[panelcontroller::class,'panelinicio'])->name('panelinicio');
/* MENÚ/APARTADOS */
Route::get('panelmenu',[panelcontroller::class,'panelmenu'])->name('panelmenu');
Route::POST('crearapartado',[panelcontroller::class,'crearapartado'])->name('crearapartado');
// REGISTRAR Y RASTREAR PEDIDOS A DOMICILIO
Route::get('consultar',[pedidoscontroller::class,'consultar'])->name('consultar'); 
Route::get('entregar',[pedidoscontroller::class,'entregar'])->name('entregar'); 
Route::get('completarPedido/{id_venta}',[pedidoscontroller::class,'completarPedido'])->name('completarPedido');
Route::POST('guardarPedido', [pedidoscontroller::class, 'guardarPedido'])->name('guardarPedido');
// LANDING PAGE
Route::get('landing',[landingpagecontroller::class,'landing'])->name('landing');
Route::POST('registrarPedido',[landingpagecontroller::class,'registrarPedido'])->name('registrarPedido');



