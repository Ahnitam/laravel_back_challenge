<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout');
});

// Route::group(['middleware' => 'auth:sanctum'], function () {
Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'show');
    Route::put('/user', 'update');
    Route::delete('/user', 'destroy');
});

Route::apiResource('customers', CustomerController::class);
Route::resource('customers.cards', CardController::class);
// });
