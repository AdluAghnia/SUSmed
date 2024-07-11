<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    // Post Routes
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::resource('posts', PostController::class)->except('index', 'show', 'edit', 'update', 'destroy');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::patch('posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // Like Routes
    Route::post('/post/{postId}/like', [LikeController::class, 'likePost'])->name('like.post');
    Route::delete('/post/{postId}/unlike', [LikeController::class, 'unlikePost'])->name('unlike.post');

    // Comment Routes
    Route::get('comments/{post_id}', [CommentController::class, 'index'])->name('comments.index');
    Route::get('/comments/{post_id}/create', [CommentController::class, 'create'])->name('comments.create');
    Route::post('/comments/{post_id}', [CommentController::class, 'store'])->name('comments.store');

    // Profile Routes
    Route::get('/dashboard', [PostController::class, 'showPostByID'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
