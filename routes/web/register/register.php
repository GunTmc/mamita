<?php

use App\Http\Controllers\Webs\Registers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('/register')->group(function () {
    Route::get('/', [RegisterController::class, 'create'])->name('register');
    Route::post('/', [RegisterController::class, 'store']);
});
