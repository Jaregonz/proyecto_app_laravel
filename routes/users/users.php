<?php

use App\Http\Controllers\UserController;

Route::get('/register', [UserController::class, 'showUserRegister'])->name('user.showRegister');
Route::post('/register', [UserController::class, 'doRegister'])->name('user.doRegister');

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'doLogin'])->name('user.doLogin');

Route::get('/leave-confirm', [UserController::class, 'showLogoutConfirm'])->name('user.logoutConfirm');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/delete-user', [UserController::class, 'deleteUser'])->name('user.delete');
Route::get('/delete-confirm', [UserController::class, 'showDeleteConfirm'])->name('user.deleteConfirm');
