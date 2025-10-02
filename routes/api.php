<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Semua route ini otomatis diprefix "/api"
| Contoh: POST http://localhost:8000/api/register
|
*/

// Tes API hidup
Route::get('/ping', function () {
    return response()->json(['message' => 'API OK']);
});

// Auth API
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Protected API (butuh token Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('todos', TodoController::class);
    Route::post('logout', [AuthController::class, 'logout']);
});
