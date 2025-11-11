<?php

use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/blogs', [BlogController::class, 'blogList']);
// Route::get('/blogs/{$id}', [BlogController::class, 'getBlogById']);
Route::get('/blogs/{id}', [BlogController::class, 'getBlogById']); // ✅ new route
Route::post('/blog/add', [BlogController::class, 'addBlog']);