<?php

use App\Http\Controllers\UserController;

Route::get('/register', [UserController::class, 'showUserRegister'])->name('user.showRegister');
Route::post('/register', [UserController::class, 'doRegister'])->name('user.doRegister');

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'doLogin'])->name('user.doLogin');