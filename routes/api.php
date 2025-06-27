<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Container\Attributes\Auth;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('/signup', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum', 'aluno'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/aluno', [AuthController::class, 'aluno']);
    Route::get('/cursos', [AuthController::class, 'cursos']);
});

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/users', [AuthController::class, 'index']);
    Route::delete('/users/{id}', [AuthController::class, 'destroy']);
});

Route::middleware(['auth:sanctum', 'professor'])->group(function () {
    Route::get('/professor', [AuthController::class, 'professor']);
    Route::get('/alunos', [AuthController::class, 'alunos']);
    Route::get('/cursos', [AuthController::class, 'cursos']);
});