<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::get('/productos', [ProductoController::class, 'index']);
Route::post('/correo', [EmailController::class, 'enviarCorreo']);

Route::middleware(['auth:sanctum', 'usuario'])->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/productos', [ProductoController::class, 'store']);
    Route::get('/productos/{id}', [ProductoController::class, 'show']);
    Route::post('/productos/{id}', [ProductoController::class, 'update']);
    Route::post('/productos/borrar/{id}', [ProductoController::class, 'destroy']);
});
