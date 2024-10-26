<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;


    Route::get('/veiculos', [VeiculoController::class, 'index']);
    Route::post('/veiculos', [VeiculoController::class, 'store']);
    Route::get('/veiculos/{id}', [VeiculoController::class, 'show']);
    Route::put('/veiculos/{id}', [VeiculoController::class, 'update']);
    Route::delete('/veiculos/{id}', [VeiculoController::class, 'destroy']);

