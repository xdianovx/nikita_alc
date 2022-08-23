<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('post')->group(function () {
    Route::get('/',  [PostController::class, 'index']);
    Route::get('/{id}',  [PostController::class, 'show']);
    Route::post('/',  [PostController::class, 'create']);
    Route::patch('/{id}',  [PostController::class, 'update']);
    Route::delete('/{id}',  [PostController::class, 'destroy']);
});
