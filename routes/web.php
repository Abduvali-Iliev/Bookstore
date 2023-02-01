<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookStoreController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[ GenreController::class, 'index'])->middleware(['auth']);

Route::resource('books', BookStoreController::class)->middleware(['auth']);
Route::resource('authors', AuthorController::class)->middleware(['auth']);
Route::resource('genres', GenreController::class)->middleware(['auth']);
Route::resource(
    'books.comments',
    \App\Http\Controllers\CommentController::class)
    ->only(['store', 'destroy', 'update', 'edit'])->middleware(['auth']);


Route::get('/admin', [AdminBooksController::class, 'index'])->middleware(['auth'])->name('admin.');

Route::prefix('admin')->middleware(['auth'])->name("admin.")->group(function(){
    Route::resources([
        'books' => AdminBooksController::class,
        'authors' => AdminAuthorController::class,
        'genres' => AdminGenreController::class
    ]);
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
