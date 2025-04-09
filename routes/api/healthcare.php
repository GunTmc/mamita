<?php

use App\Http\Controllers\API\HealthCareController;
use Illuminate\Support\Facades\Route;

Route::prefix('/healthcare')->group(function () {
    Route::get('/', [HealthCareController::class, 'index'])->name('healthcare.index');
    Route::get('/{id}', [HealthCareController::class, 'show'])->name('healthcare.show');
});
