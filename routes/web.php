<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\panelcontroller;

Route::get('panelinicio',[panelcontroller::class,'panelinicio'])->name('panelinicio');
