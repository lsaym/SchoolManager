<?php

use App\Http\Controllers\managerController;
use Illuminate\Support\Facades\Route;

Route::get('index', [managerController::class, 'index'])->name('index');
Route::get('painelAcademico', [managerController::class, 'painelAcademico'])->name('painelAcademico');
