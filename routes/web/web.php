<?php


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
});

// auth
require __DIR__ . '/auth/auth.php';

// register
require __DIR__ . '/register/register.php';
