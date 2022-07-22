<?php

use App\Http\Controllers\API\CursosController;
use App\Http\Controllers\API\InscricaoController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['prefix' => 'cursos', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [CursosController::class, 'index']);
    Route::post('add', [CursosController::class, 'add']);
    Route::get('edit/{id}', [CursosController::class, 'edit']);
    Route::post('update/{id}', [CursosController::class, 'update']);
    Route::delete('delete/{id}', [CursosController::class, 'delete']);
});

Route::group(['prefix' => 'Inscricao', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [InscricaoController::class, 'index']);
    Route::post('add', [InscricaoController::class, 'Add']);
    Route::get('edit/{id}', [InscricaoController::class, 'Edit']);
    Route::post('update/{id}', [InscricaoController::class, 'Update']);
    Route::delete('delete/{id}', [InscricaoController::class, 'Delete']);
});