<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\NicheController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/blogs', [BlogController::class, 'blogList']);
Route::get('/niches', [NicheController::class, 'nichelist']);
Route::get('/blogs/search', [BlogController::class, 'searchBlogs']);
// Route::get('/blogs/{$id}', [BlogController::class, 'getBlogById']);
Route::get('/blogs/{id}', [BlogController::class, 'getBlogById']); // new route
Route::post('/blog/add', [BlogController::class, 'addBlog']);