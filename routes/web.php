<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/logout', function() {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegister']);
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);

Route::get('/reset-password', [\App\Http\Controllers\AuthController::class, 'showReset']);
Route::post('/reset-password/request', [\App\Http\Controllers\AuthController::class, 'requestReset']);
Route::post('/reset-password/verify', [\App\Http\Controllers\AuthController::class, 'verifyResetCode']);
Route::post('/reset-password/complete', [\App\Http\Controllers\AuthController::class, 'completeReset']);
