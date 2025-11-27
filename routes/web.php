<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'status' => False,
        'message' => 'You are not allowed to access!',
    ]);
});
