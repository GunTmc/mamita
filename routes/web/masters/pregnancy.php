<?php

use App\Http\Controllers\Masters\PregnancyController;
use Illuminate\Support\Facades\Route;


Route::prefix('pregnancies')->group(function () {
    Route::get('/', [PregnancyController::class, 'index'])->name('pregnancy.index');
    Route::get('/edit/{id}', [PregnancyController::class, 'edit'])->name('pregnancy.edit');
    Route::post('/update/{id}', [PregnancyController::class, 'update'])->name('pregnancy.update');
    Route::post('/delete/{id}', [PregnancyController::class, 'destroy'])->name('pregnancy.delete');
});
