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



Auth::routes();

Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('home');
Route::get('/my', [App\Http\Controllers\WritingController::class, 'my'])->name('my_writings');
Route::get('/writings/create', [App\Http\Controllers\WritingController::class, 'create'])->name('writing.create');
Route::post('/writings/store', [App\Http\Controllers\WritingController::class, 'store'])->name('writing.store');
Route::patch('/writings/update/{writing}', [App\Http\Controllers\WritingController::class, 'update'])->name('writing.update');

Route::get('/writings/{writing}', [App\Http\Controllers\WritingController::class, 'show'])->name('writing.show');
Route::get('/writings/edit/{writing}', [App\Http\Controllers\WritingController::class, 'edit'])->name('writing.edit');

//POSTS
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::post('/posts/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');

