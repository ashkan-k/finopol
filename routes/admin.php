<?php

use App\Http\Controllers\Admin\TokenController;
use Illuminate\Support\Facades\Route;

Route::resource('tokens', TokenController::class)->names('tokens');

Route::get('/', function () {
    return view('admin.dashboard');
});

