<?php

use App\Http\Controllers\Admin\TokenController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FinoServiceController;
use Illuminate\Support\Facades\Route;

Route::resource('tokens', TokenController::class)->names('tokens');
Route::resource('users', UserController::class)->names('users');
Route::resource('finoservices', FinoServiceController::class)->names('finoservices');

Route::get('/', function () {
    return view('admin.dashboard');
})->name('index');

