<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\panelcontroller;
use App\Http\Controllers\pedidoscontroller;
use App\Http\Controllers\landingpagecontroller;

// ADMINISTRACIÓN
Route::get('panelinicio',[panelcontroller::class,'panelinicio'])->name('panelinicio');
/* CREAR MENÚ/APARTADOS */
Route::get('panelmenu',[panelcontroller::class,'panelmenu'])->name('panelmenu');
Route::POST('crearapartado',[panelcontroller::class,'crearapartado'])->name('crearapartado');
// Landing Page
Route::get('inicio',[landingpagecontroller::class,'inicio'])->name('inicio');
Route::get('pedidos',[landingpagecontroller::class,'pedidos'])->name('pedidos');
// REGISTRAR Y RASTREAR PEDIDOS A DOMICILIO
Route::get('consultar',[pedidoscontroller::class,'consultar'])->name('consultar'); 
Route::get('entregar',[pedidoscontroller::class,'entregar'])->name('entregar'); 
Route::get('entregaPedido/{id_venta}',[pedidoscontroller::class,'entregaPedido'])->name('entregaPedido');
Route::POST('guardarPedido', [pedidoscontroller::class, 'guardarPedido'])->name('guardarPedido');
