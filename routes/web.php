<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::resource('posts', PostController::class)->except('index', 'edit', 'update');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::post('/post/{postId}/like', [LikeController::class, 'likePost'])->name('like.post');
    Route::delete('/post/{postId}/unlike', [LikeController::class, 'unlikePost'])->name('unlike.post');
    Route::get('/comments/{post}', [CommentController::class, 'index'])->name('comments.index');
    Route::post('comment/{post_id}', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/dashboard', [PostController::class, 'showPostByID'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
