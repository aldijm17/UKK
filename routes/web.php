<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BicyclesController;
use App\Http\Controllers\CustomersController;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('bicycles', BicyclesController::class);
Route::resource('customers', CustomersController::class);

