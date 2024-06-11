<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/blog')->group(function() {
    Route::get('/', function () {
        return view('accueil');
    });
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.list');
    Route::get('/authors/{id}', [AuthorController::class, 'show'])->name('author.show');
    Route::get('/authors/create', [AuthorController::class, 'create'])->name('author.create');
});

