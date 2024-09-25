<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();  // You only need this once for authentication routes.

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::middleware('auth:api')->group(function () {
    // Blog post routes
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('posts/{id}', [PostController::class, 'show']);
    Route::get('/posts/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::put('posts/{id}', [PostController::class, 'update']);
    Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    // Comment routes (uncomment these if needed)
    Route::post('posts/{post}/comments', [CommentController::class, 'store']);
    Route::put('comments/{id}', [CommentController::class, 'update']);
    Route::delete('comments/{id}', [CommentController::class, 'destroy']);
//});

//Route::get('category', [CategoryController::class, 'index'])->name('category.index');
