<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\CssSelector\Node\FunctionNode;
Route::get('/', [PostController::class, 'index'])->name('login');

Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/login', [AuthController::class, 'loginProfile']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/store', [AuthController::class, 'store']);
    Route::get('/store', [AuthController::class, 'storeUser']);
});

Route::middleware('auth')->group(function () {
    Route::post('/postupload', [PostController::class, 'uploadpost']);
    Route::get('/posts/users/{user:username}/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/post/{post:slug}', [PostController::class, 'showOne'])->name('post');
    Route::post('/post/{post:slug}/comment', [CommentController::class, 'store']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::patch('/upload/{user:username}', [AuthController::class, 'upload']);
    Route::post('/post/{post:slug}/subscribe', [SubscriberController::class, 'subscribers']);
});
