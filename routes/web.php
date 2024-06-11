<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/blog')->group(function() {
    Route::get('/', [AuthorController::class, 'home'])->name('home');
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/authors/{author}', [AuthorController::class, 'show'])->name('authors.show');
    Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('/authors',[AuthorController::class, 'store'])->name('authors.store');
    Route::get('/authors/edit/{author}',[AuthorController::class, 'edit'])->name('authors.edit');
    Route::post('/authors/{author}',[AuthorController::class, 'update'])->name('authors.update');
    Route::get('/authors/{author}',[AuthorController::class, 'destroy'])->name('authors.destroy');
});

