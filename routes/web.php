<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MangeBooks;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/manage', [MangeBooks::class, 'index'])->name('manage');    

Route::get('/about', [AboutController::class, 'index'])->name('about');    

Route::post('/add-book', [MangeBooks::class, 'addBook'])->name('add-book');

Route::post('/edit-book', [MangeBooks::class, 'editBook'])->name('edit-book');

Route::post('/delete-book', [MangeBooks::class, 'deleteBook'])->name('delete-book');

Route::get('/search', [HomeController::class, 'searchBook'])->name('search-book');