<?php


use App\Http\Controllers\API\RegistrationChildController;
use App\Http\Controllers\API\RegistrationPregnancyController;
use App\Http\Controllers\Webs\ScheduleUserController;
use App\Http\Controllers\Webs\DashboardController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(AuthMiddleware::class)->group(function () {
    Route::get('/', DashboardController::class)->name('home');

    // user 
    require __DIR__ . '/users/user.php';

    // pregnancy
    require __DIR__ . '/masters/pregnancy.php';

    // article
    require __DIR__ . '/masters/article.php';

    // child
    require __DIR__ . '/masters/child.php';

    // food 
    require __DIR__ . '/masters/food.php';

    // activity
    require __DIR__ . '/masters/activity.php';

    // toDo
    require __DIR__ . '/masters/toDo.php';

    // profile 
    require __DIR__ . '/profile/profile.php';

    Route::prefix('/registration/{userId}')->group(function () {
        Route::get('pregnancy', [RegistrationPregnancyController::class, 'index'])->name('registrationPregnancy.index');
        Route::get('pregnancy/{id}/edit', [RegistrationPregnancyController::class, 'edit'])->name('registrationPregnancy.edit');
        Route::post('pregnancy/{id}/edit', [RegistrationPregnancyController::class, 'update'])->name('registrationPregnancy.update');
        Route::post('pregnancy/{id}/delete', [RegistrationPregnancyController::class, 'destroy'])->name('registrationPregnancy.delete');

        Route::get('child/', [RegistrationChildController::class, 'index'])->name('registrationChild.index');
        Route::get('child/{id}/edit', [RegistrationChildController::class, 'edit'])->name('registrationChild.edit');
        Route::post('child/{id}/edit', [RegistrationChildController::class, 'update'])->name('registrationChild.update');
        Route::post('child/{id}/delete', [RegistrationChildController::class, 'destroy'])->name('registrationChild.delete');
    });

    Route::prefix('/schedules/{userId}/{type}')->group(function () {
        Route::get('/', [ScheduleUserController::class, 'index'])->name('schedules.user.index');
        Route::get('/create', [ScheduleUserController::class, 'create'])->name('schedules.user.create');
        Route::post('create', [ScheduleUserController::class, 'store'])->name('schedules.user.store');
        Route::get('/{id}/edit', [ScheduleUserController::class, 'edit'])->name('schedules.user.edit');
        Route::post('/{id}/edit', [ScheduleUserController::class, 'update'])->name('schedules.user.update');
        Route::post('/{id}/delete', [ScheduleUserController::class, 'destroy'])->name('schedules.user.delete');
    });
});

// auth
require __DIR__ . '/auth/auth.php';

// register
require __DIR__ . '/register/register.php';
