<?php

use App\Http\Controllers\CommentController;

Route::middleware(['auth'])->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::post('/comment/{userId}/{postId}', [CommentController::class, 'addComment'])->name('comment.add');
    });
});