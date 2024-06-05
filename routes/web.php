<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::middleware('auth')->prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/create', [PostController::class, 'create']);
    Route::post('/create', [PostController::class, 'create']);
    Route::get('/author/{user:username}', [PostController::class, 'author']);
    Route::get('/category/{category:slug}', [PostController::class, 'category']);
    Route::get('/{post:slug}', [PostController::class, 'show']);
    Route::delete('/{post:slug}', [PostController::class, 'delete']);
    Route::get('/{post:slug}/edit', [PostController::class, 'edit']);
    Route::put('/{post:slug}/edit', [PostController::class, 'edit']);
});

Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'index']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/not-authorized', [AuthController::class, 'notAuthorized']);
    Route::get('/account/verify', [AuthController::class, 'verifyNotice'])
        ->middleware('auth')
        ->name('verification.notice');
    Route::get('/account/verify/{id}/{hash}', [AuthController::class, 'verifyHandler'])
        ->middleware(['auth', 'signed'])
        ->name('verification.verify');
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});
