<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PublisherController;

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


Route::resource('books', BookController::class);

Route::resource('authors', AuthorController::class);

Route::resource('categories', CategoryController::class);

Route::resource('publishers', PublisherController::class);

Route::post('/books/{book}/comments', [CommentController::class, 'store'])
    ->name('comments.store')
    ->middleware('auth');
