<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;

Route::middleware('auth')->group(function () {
    Route::get('/', [PostController::class,'index'])->name('posts.index');
    Route::resource('posts', PostController::class)->except('index');
    Route::post('/post/{postId}/like', [LikeController::class,'likePost'])->name('like.post');
    Route::delete('/post/{postId}/unlike', [LikeController::class, 'unlikePost'])->name('unlike.post');
    Route::post ('/comment/{postId}/', [CommentController::class,'store'])->name('comment.add'); 
    Route::get('/dashboard', [PostController::class,'showPostByID'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
