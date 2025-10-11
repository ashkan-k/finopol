<?php

use App\Http\Controllers\Admin\TokenController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FinoServiceController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\ApiCallController;
use App\Http\Controllers\Admin\WalletHistoryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\WalletController;

Route::resource('tokens', TokenController::class)->names('tokens');
Route::resource('users', UserController::class)->names('users');
Route::get('users/{user}/detail', [UserController::class, 'show'])->name('users.detail');
Route::patch('users/{user}/update-status', [UserController::class, 'updateStatus'])->name('users.update-status');
Route::resource('finoservices', FinoServiceController::class)->names('finoservices');
Route::resource('tickets', TicketController::class)->names('tickets');
Route::get('api-calls', [ApiCallController::class, 'index'])->name('api-calls.index');
Route::post('/tickets-answer/{ticket}', [TicketController::class, 'store_answer'])->name('tickets-answer-store');

// Wallet management
Route::get('wallets-histories', [WalletHistoryController::class, 'index'])->name('wallets-histories.index');
Route::get('wallets-histories/export', [WalletHistoryController::class, 'export'])->name('wallets-histories.export');
Route::get('wallets', [WalletController::class, 'index'])->name('wallets.index');

//Route::get('wallets/{wallet}/transactions', [WalletController::class, 'transactions'])->name('wallets.transactions');
//Route::get('wallets/{wallet}/charge', [WalletController::class, 'charge'])->name('wallets.charge');

Route::get('/', function () {
    return view('admin.dashboard');
})->name('index');

