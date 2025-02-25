<?php

use App\Http\Controllers\PostController;

Route::middleware(['auth'])->group(function () {
    Route::get('/{userId}', [PostController::class, 'showIndexPosts'])->name('posts.index');
    Route::put('/{id}/{userId}', [PostController::class, 'likePost'])->name('posts.like');
    Route::delete('/{id}/{userId}', [PostController::class, 'deletePost'])->name('posts.delete');

    Route::get('/show-post/{id}/{userId}', [PostController::class, 'showPost'])->name('post.show');

});