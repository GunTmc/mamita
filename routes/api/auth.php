<?php

use App\Http\Controllers\API\Auths\AuthController;
use App\Http\Middleware\AuthApiMiddleware;
use Illuminate\Support\Facades\Route;

Route::post('/auth/login', [AuthController::class, 'auth']);
Route::middleware(AuthApiMiddleware::class)->post('/auth/logout', [AuthController::class, 'logout']);
