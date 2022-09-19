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

Route::get('/', [App\Http\Controllers\WritingController::class, 'index'])->name('home');

Route::post('/', [App\Http\Controllers\WritingController::class, 'filter']);

Route::get('/writing/{writing}', [App\Http\Controllers\WritingController::class, 'show'])->name('writing.show');

//POSTS
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');

Route::middleware('auth')->group(function () {
    Route::get('/my', [App\Http\Controllers\WritingController::class, 'my'])->name('my_writings');

    Route::get('/post/create/{writing}', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/post', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::get('/post/edit/{post}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/update/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    
    Route::get('/writing/create', [App\Http\Controllers\WritingController::class, 'create'])->name('writing.create');
    Route::post('/writing', [App\Http\Controllers\WritingController::class, 'store'])->name('writing.store');
    Route::patch('/writing/update/{writing}', [App\Http\Controllers\WritingController::class, 'update'])->name('writing.update');
    Route::get('/writing/edit/{writing}', [App\Http\Controllers\WritingController::class, 'edit'])->name('writing.edit');

});
