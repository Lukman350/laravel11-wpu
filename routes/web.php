<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::group(['prefix' => 'posts'], function () {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/create', [PostController::class, 'create']);
    Route::post('/create', [PostController::class, 'create']);
    Route::get('/author/{user}', [PostController::class, 'author']);
    Route::get('/category/{category:slug}', [PostController::class, 'category']);
    Route::get('/{post:slug}', [PostController::class, 'show']);
    Route::delete('/{post:slug}', [PostController::class, 'delete']);
    Route::get('/{post:slug}/edit', [PostController::class, 'edit']);
    Route::put('/{post:slug}/edit', [PostController::class, 'edit']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});
