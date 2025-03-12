<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\AlumneController;
use Illuminate\Support\Facades\Route;

Route::get('/classes', [ClasseController::class, 'index']);

Route::post('/classes', [ClasseController::class, 'store']);

Route::get('/classes/{id}', [ClasseController::class, 'show']);

Route::post('/classes/{id}/alumnes', [ClasseController::class, 'addAlumne']);

Route::get('/classes/{id}/alumnes', [ClasseController::class, 'getAlumnes']);

