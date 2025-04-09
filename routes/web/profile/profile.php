<?php

use App\Http\Controllers\Profiles\MediaSocialController;
use App\Http\Controllers\Profiles\ProfileController;
use App\Http\Controllers\Profiles\PropertiesProfileController;
use App\Http\Controllers\Schedules\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::prefix('profile')->group(function () {
    Route::get('properties', PropertiesProfileController::class)->name('profile.properties');
    Route::get('edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('media-social', [MediaSocialController::class, 'show'])->name('profile.media-social.show');
    Route::get('media-social/{mediaSocial}', [MediaSocialController::class, 'edit'])->name('profile.media-social.edit');
    Route::post('media-social', [MediaSocialController::class, 'update'])->name('profile.media-social.update');

    Route::prefix('schedule')->group(function () {
        Route::get('', [ScheduleController::class, 'index'])->name('schedule.index');
        Route::get('create', [ScheduleController::class, 'create'])->name('schedule.create');
        Route::post('create', [ScheduleController::class, 'store'])->name('schedule.store');
        Route::get('update/{id}', [ScheduleController::class, 'edit'])->name('schedule.edit');
        Route::post('update/{id}', [ScheduleController::class, 'update'])->name('schedule.update');
        Route::post('delete/{id}', [ScheduleController::class, 'destroy'])->name('schedule.delete');
    });
});
