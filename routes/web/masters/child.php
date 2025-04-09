<?php

use App\Http\Controllers\Masters\ChildController;
use Illuminate\Support\Facades\Route;

Route::prefix('children')->group(function () {
    Route::get('/', [ChildController::class, 'index'])->name('child.index');
    Route::get('/update/{id}', [ChildController::class, 'edit'])->name('child.edit');
    Route::post('/update/{id}', [ChildController::class, 'update'])->name('child.update');
});
