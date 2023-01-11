<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('books', App\Http\Controllers\BookController::class)->middleware("auth");
Route::resource('categories', App\Http\Controllers\CategoryController::class)->middleware("auth");;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::put('/books/reserve/{id}', [App\Http\Controllers\BookController::class, 'reserve'])->name('books.reserve');
Route::put('/books/delivery/{id}', [App\Http\Controllers\BookController::class, 'delivery'])->name('books.delivery');
