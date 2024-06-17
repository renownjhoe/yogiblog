<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){

    Route::get('/user', function(Request $request) {
        return $request->user();
    });

    Route::resource('posts', PostController::class);

    Route::get('/posts/search', 'PostController@search');

    Route::post('/posts/{post}/comments', 'CommentController@store');

});
