<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/blog')->group(function () {
    Route::get('/', [AuthorController::class, 'home'])->name('authors.home');
    Route::prefix('/authors')->group(function () {
        Route::get('/index', [AuthorController::class, 'index'])->name('authors.index');
        Route::get('/show/{author}', [AuthorController::class, 'show'])->name('authors.show');
        Route::get('/create', [AuthorController::class, 'create'])->name('authors.create');
        Route::post('/store', [AuthorController::class, 'store'])->name('authors.store');
        Route::get('/{author}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
        Route::post('/update/{author}', [AuthorController::class, 'update'])->name('authors.update');
        Route::get('/delete/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');
    });
});
