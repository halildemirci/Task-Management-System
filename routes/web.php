<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/login', AuthController::class . '@login')->name('auth.login');
Route::post('/authenticate', AuthController::class . '@authenticate')->name('auth.authenticate');
Route::get('/register', AuthController::class . '@register')->name('auth.register');
Route::post('/store-user', AuthController::class . '@storeUser')->name('auth.storeUser');

Route::middleware([AuthCheck::class])->group(function () {
    // Tasks
    Route::get('/', TaskController::class . '@index')->name('tasks.index');
    Route::get('/task/create', TaskController::class . '@create')->name('tasks.create');
    Route::post('/task/store', TaskController::class . '@store')->name('tasks.store');
    Route::get('/task/edit/{id}', TaskController::class . '@edit')->name('tasks.edit');
    Route::put('/task/update/{id}', TaskController::class . '@update')->name('tasks.update');
    Route::patch('/task/completed/{id}', TaskController::class . '@taskCompleted')->name('tasks.completed');
    Route::post('/task/delete/{id}', TaskController::class . '@destroy')->name('tasks.destroy');

    // User
    Route::get('/users', UserController::class . '@index')->name('users.index');
    Route::get('/user/{id}', UserController::class . '@profile')->name('users.profile');

    // Auth
    Route::get('/logout', AuthController::class . '@logout')->name('auth.logout');
});
