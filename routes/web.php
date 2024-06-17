<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Livewire\PostList;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {});

Route::middleware('auth')->group(function(){

    Route::controller(PostController::class)->group(function(){
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/posts', 'index')->name('posts.index'); // List all posts
        Route::get('/posts/create', 'create')->name('posts.create'); // Show create post form
        Route::post('/posts', 'store')->name('posts.store'); // Store a new post
        Route::get('/posts/{id}', 'show')->name('posts.show');// show details of post
        Route::get('/posts/{post}/edit', 'edit')->name('posts.edit');
        Route::put('/posts/{post}', 'update')->name('posts.update'); // Update an existing post (route model binding)
        Route::delete('/posts/{post}', 'destroy')->name('posts.destroy'); // Delete a post (route model binding)
        Route::get('/posts', 'search')->name('posts.search');
    });

    Route::controller(CommentController::class)->group(function(){
        Route::post('/posts/{post}/comments', 'store')->name('comments.store'); // Store a new comment on a specific post (route model binding)
    });

    Route::controller(AdminController::class)->group(function(){
        Route::get('users', 'index')->name('users');
        Route::get('users/create', 'create')->name('users.create');
        Route::get('users/search', 'create')->name('users.search');
        Route::get('/users/{id}', 'show')->name('user.show');// show details of user
    })->middleware('admin');

});
