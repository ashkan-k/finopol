<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
//    \App\Models\User::create([
//        'email' => 'as@gmail.com',
//        'phone' => '09396988720',
//        'password' => \Illuminate\Support\Facades\Hash::make('123'),
//        'name' => 'ashkan',
//        'email_verified_at' => now(),
//    ]);

    \Illuminate\Support\Facades\Auth::loginUsingId(1);

    return view('welcome');
});

Route::get('/login', function () {
    return view("auth.login");
});

Route::get('/register', function () {
    return view("auth.register");
});

Route::get('/reset-password', function () {
    return view("auth.reset-password");
});
