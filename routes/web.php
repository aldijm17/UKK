<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BicyclesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomersController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//middleware
Route::middleware('auth')->group(function () {
    Route::resource('bicycles', BicyclesController::class);
    Route::resource('customers', CustomersController::class);
});

