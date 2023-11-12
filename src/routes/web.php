<?php

use fabienlk\mypov\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;


Route::controller(CommentController::class)->group(function(){
    Route::middleware(['guest', 'web'])->group(function (){
        Route::post('/create/{id}', 'create')->name('addComment');
    });
});
