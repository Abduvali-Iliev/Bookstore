<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookStoreController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\BookStoreController as AdminBooksController;
use App\Http\Controllers\admin\AuthorController as AdminAuthorController;
use App\Http\Controllers\admin\GenreController as AdminGenreController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ GenreController::class, 'index']);

Route::resource('books', BookStoreController::class);
Route::resource('authors', AuthorController::class);
Route::resource('genres', GenreController::class);



Route::get('/admin', [AdminBooksController::class, 'index'])->name('admin.');

Route::prefix('admin')->name("admin.")->group(function(){
    Route::resources([
        'books' => AdminBooksController::class,
        'authors' => AdminAuthorController::class,
        'genres' => AdminGenreController::class
    ]);
});



