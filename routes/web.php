<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\CategoriesController;

// Home
Route::get('/', function () {
    return redirect()->route('books.index');
});

// Books CRUD
Route::prefix('books')->name('books.')->group(function () {
    Route::get('/', [BooksController::class, 'index'])->name('index');
    Route::get('/create', [BooksController::class, 'create'])->name('create');
    Route::post('/', [BooksController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [BooksController::class, 'edit'])->name('edit');
    Route::put('/{id}', [BooksController::class, 'update'])->name('update');
    Route::delete('/{id}', [BooksController::class, 'destroy'])->name('destroy');
});

// Authors CRUD
Route::prefix('authors')->name('authors.')->group(function () {
    Route::get('/', [AuthorsController::class, 'index'])->name('index');
    Route::get('/create', [AuthorsController::class, 'create'])->name('create');
    Route::post('/', [AuthorsController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [AuthorsController::class, 'edit'])->name('edit');
    Route::put('/{id}', [AuthorsController::class, 'update'])->name('update');
    Route::delete('/{id}', [AuthorsController::class, 'destroy'])->name('destroy');
});

// Categories CRUD
Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/', [CategoriesController::class, 'index'])->name('index');
    Route::get('/create', [CategoriesController::class, 'create'])->name('create');
    Route::post('/', [CategoriesController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [CategoriesController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CategoriesController::class, 'update'])->name('update');
    Route::delete('/{id}', [CategoriesController::class, 'destroy'])->name('destroy');
});
