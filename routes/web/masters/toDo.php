<?php

use App\Http\Controllers\Masters\ToDoController;
use Illuminate\Support\Facades\Route;

Route::prefix('toDos')->group(function () {
    Route::get('', [ToDoController::class, 'index'])->name('toDo.index');
    Route::get('create', [ToDoController::class, 'create'])->name('toDo.create');
    Route::post('create', [ToDoController::class, 'store'])->name('toDo.store');
    Route::get('update/{id}', [ToDoController::class, 'edit'])->name('toDo.edit');
    Route::post('update/{id}', [ToDoController::class, 'update'])->name('toDo.update');
    Route::post('delete/{id}', [ToDoController::class, 'destroy'])->name('toDo.delete');
});
