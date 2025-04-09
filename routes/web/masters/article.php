<?php

use App\Http\Controllers\Masters\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Models\Masters\Article;

Route::prefix('/articles/{type}/{sourceId}')
    ->group(function () {
        Route::get('/', [ArticleController::class, 'index'])->name('article.index');
        Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
        Route::post('/create', [ArticleController::class, 'store'])->name('article.store');
        Route::get('/update/{id}', [ArticleController::class, 'edit'])->name('article.edit');
        Route::post('/update/{id}', [ArticleController::class, 'update'])->name('article.update');
    });
