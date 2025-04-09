<?php

use App\Http\Controllers\API\Registers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('/registration', [RegisterController::class, 'register']);
