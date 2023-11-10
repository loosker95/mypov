<?php

use fabienlk\mypov\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;


Route::get('/show', [CommentController::class, 'show'])->middleware(['guest', 'web']);

Route::post('/create', [CommentController::class, 'create'])->name('addComment');
