<?php

use App\Http\Controllers\Masters\FoodController;
use Illuminate\Support\Facades\Route;

Route::prefix('foods')->group(function () {
    Route::get('', [FoodController::class, 'index'])->name('food.index');
    Route::get('create', [FoodController::class, 'create'])->name('food.create');
    Route::post('create', [FoodController::class, 'store'])->name('food.store');
    Route::get('update/{id}', [FoodController::class, 'edit'])->name('food.edit');
    Route::post('update/{id}', [FoodController::class, 'update'])->name('food.update');
    Route::post('delete/{id}', [FoodController::class, 'destroy'])->name('food.delete');
});
