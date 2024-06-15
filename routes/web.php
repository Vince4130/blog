<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/blog')->group(function () {
    
    Route::get('/', [AuthorController::class, 'home'])->name('home');
    
    Route::prefix('/authors')->group(function () {
        Route::get('/index', [AuthorController::class, 'index'])->name('authors.index');
        Route::get('/show/{author}', [AuthorController::class, 'show'])->name('authors.show');
        Route::get('/create', [AuthorController::class, 'create'])->name('authors.create');
        Route::post('/store', [AuthorController::class, 'store'])->name('authors.store');
        Route::get('/{author}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
        Route::post('/update/{author}', [AuthorController::class, 'update'])->name('authors.update');
        Route::get('/delete/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');
    });

    Route::prefix('/articles')->group(function () {
        Route::get('/index', [ArticleController::class, 'index'])->name('articles.index');
        Route::get('/show/{article}', [ArticleController::class, 'show'])->name('articles.show');
        Route::get('/create/{author}', [ArticleController::class, 'create'])->name('articles.create');
        Route::post('/store', [ArticleController::class, 'store'])->name('articles.store');
        Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
        Route::post('/update/{article}', [ArticleController::class, 'update'])->name('articles.update');
        Route::get('/delete/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    });
});
