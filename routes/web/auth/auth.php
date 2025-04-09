<?php

use App\Http\Controllers\Webs\Auths\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'auth']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
