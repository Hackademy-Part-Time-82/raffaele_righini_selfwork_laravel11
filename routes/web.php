<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/dettaglio-libro/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/create', [BookController::class, 'create'])->name('books.create')->middleware('auth');

Route::post('/salva-libro', [BookController::class, 'store'])->name('books.store')->middleware('auth');
Route::get('/modifica-libro/{book}', [BookController::class, 'edit'])->name('books.edit')->middleware('auth');
Route::put('/aggiorna-libro/{book}', [BookController::class, 'update'])->name('books.update')->middleware('auth');
Route::delete('/elimina-libro/{book}', [BookController::class, 'destroy'])->name('books.destroy')->middleware('auth');

Route::resource('authors', AuthorController::class);

Route::get('/profilo', [UserController::class, 'index'])->name('user.profile')->middleware('auth');

