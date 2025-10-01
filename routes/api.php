<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GuestController;
use App\Http\Controllers\Api\AuthController; // tambahkan controller auth

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Semua route di sini otomatis prefiks /api/
| Contoh akses: http://127.0.0.1:8000/api/guests
|
*/

// route test default
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ===== Guest API =====
Route::get('/guests', [GuestController::class, 'index']);      // GET semua guest
Route::post('/guests', [GuestController::class, 'store']);     // POST tambah guest
Route::get('/guests/{id}', [GuestController::class, 'show']);  // GET detail guest
Route::put('/guests/{id}', [GuestController::class, 'update']); // PUT update guest
Route::delete('/guests/{id}', [GuestController::class, 'destroy']); // DELETE guest

// ===== Auth API =====
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
