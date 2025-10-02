<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\TodoController as WebTodoController;
use App\Http\Controllers\Web\AuthController as WebAuthController;

Route::get('/', function () {
    return redirect()->route('todos.index');
});

// Auth web
Route::get('register', [WebAuthController::class, 'showRegister'])->name('register');
Route::post('register', [WebAuthController::class, 'register']);
Route::get('login', [WebAuthController::class, 'showLogin'])->name('login');
Route::post('login', [WebAuthController::class, 'login']);
Route::post('logout', [WebAuthController::class, 'logout'])->name('logout');

// Todo web (hanya bisa diakses user yang login)
Route::middleware('auth')->group(function () {
    Route::get('todos', [WebTodoController::class, 'index'])->name('todos.index');
    Route::get('todos/create', [WebTodoController::class, 'create'])->name('todos.create');
    Route::post('todos', [WebTodoController::class, 'store'])->name('todos.store');
    Route::get('todos/{id}/edit', [WebTodoController::class, 'edit'])->name('todos.edit');
    Route::put('todos/{id}', [WebTodoController::class, 'update'])->name('todos.update');
    Route::delete('todos/{id}', [WebTodoController::class, 'destroy'])->name('todos.destroy');
});
