<?php

use App\Http\Controllers\Masters\ActivityController;
use Illuminate\Support\Facades\Route;

Route::prefix('activities')->group(function () {
    Route::get('', [ActivityController::class, 'index'])->name('activity.index');
    Route::get('create', [ActivityController::class, 'create'])->name('activity.create');
    Route::post('create', [ActivityController::class, 'store'])->name('activity.store');
    Route::get('update/{id}', [ActivityController::class, 'edit'])->name('activity.edit');
    Route::post('update/{id}', [ActivityController::class, 'update'])->name('activity.update');
    Route::post('delete/{id}', [ActivityController::class, 'destroy'])->name('activity.delete');
});
