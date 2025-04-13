<?php

use App\Http\Controllers\web\auth\AuthController;
use App\Http\Middleware\web\checkAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::get('/signup', 'register')->name('register');
    Route::post('/signup', 'signup')->name('signup');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'signin')->name('signin');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware(checkAdmin::class);
