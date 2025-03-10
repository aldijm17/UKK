<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BicyclesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\RentalsController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//middleware
Route::middleware('auth')->group(function () {
    Route::resource('bicycles', BicyclesController::class);
    Route::resource('customers', CustomersController::class);
    Route::resource('rentals', RentalsController::class);
});

