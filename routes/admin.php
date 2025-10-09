<?php

use App\Http\Controllers\Admin\TokenController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FinoServiceController;
use App\Http\Controllers\Admin\TicketController;
use Illuminate\Support\Facades\Route;

Route::resource('tokens', TokenController::class)->names('tokens');
Route::resource('users', UserController::class)->names('users');
Route::resource('finoservices', FinoServiceController::class)->names('finoservices');
Route::resource('tickets', TicketController::class)->names('tickets');
Route::post('/tickets-answer/{ticket}', [TicketController::class, 'store_answer'])->name('tickets-answer-store');

Route::get('/', function () {
    return view('admin.dashboard');
})->name('index');

