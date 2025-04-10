<?php

// auth 

use App\Http\Controllers\API\ActivityController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\ChildController;
use App\Http\Controllers\API\FoodController;
use App\Http\Controllers\API\PregnancyController;
use App\Http\Controllers\API\RegistrationChildController;
use App\Http\Controllers\API\RegistrationPregnancyController;
use App\Http\Middleware\AuthApiMiddleware;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/api/auth.php';

// registration
require __DIR__ . '/api/registration.php';

Route::middleware(AuthApiMiddleware::class)->group(function () {
    // healcare
    require __DIR__ . '/api/healthcare.php';

    Route::get('articles/{type}/{sourceId}', [ArticleController::class, 'index']);
    Route::get('foods', [FoodController::class, 'index']);
    Route::get('activities', [ActivityController::class, 'index']);
    Route::get('pregnancies', [PregnancyController::class, 'index']);
    Route::get('children', [ChildController::class, 'index']);

    Route::post('registration/pregnancy', [RegistrationPregnancyController::class, 'store']);
    Route::post('registration/child', [RegistrationChildController::class, 'store']);
});
