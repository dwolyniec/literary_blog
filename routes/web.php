<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\WritingController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [WritingController::class, 'index'])->name('home');

Route::post('/', [WritingController::class, 'filter']);


Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('/writing/{writing}', [WritingController::class, 'show'])->name('writing.show');

Route::middleware('auth')->group(function () {
    Route::get('/my', [WritingController::class, 'my'])->name('my_writings');
    
    Route::resource('post', PostController::class)->except(['show']);
    Route::resource('writing', WritingController::class)->except(['show']);

    Route::post('/writing/rate/{writing}', [WritingController::class, 'rate'])->name('writing.rate');

});


