<?php

use App\Http\Controllers\Admin\TokenController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('tokens', TokenController::class)->names('tokens');
Route::resource('users', UserController::class)->names('users');

Route::get('/', function () {
    return view('admin.dashboard');
})->name('index');

