<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::delete('/posts/{post:slug}', [PostController::class, 'delete']);
Route::get('/posts/{post:slug}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post:slug}/edit', [PostController::class, 'edit']);

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});
