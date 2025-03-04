<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Auth
Route::post('/auth/login', AuthController::class . '@authenticate');
Route::post('/auth/register', AuthController::class . '@storeUser');

Route::middleware("auth:sanctum")->group(function () {
    // Tasks
    Route::get('/tasks', TaskController::class . '@index');
    Route::post('/task/create', TaskController::class . '@store');
    Route::put('/task/edit/{id}', TaskController::class . '@update');
    Route::patch('/task/completed/{id}', TaskController::class . '@taskCompleted');
    Route::delete('/task/delete/{id}', TaskController::class . '@destroy');

    // Users
    Route::get('/users', UserController::class . '@index')->name('users.index');
    Route::get('/user/{id}', UserController::class . '@profile')->name('users.profile');

    // Auth
    Route::get('/auth/logout', AuthController::class . '@logout');
});
