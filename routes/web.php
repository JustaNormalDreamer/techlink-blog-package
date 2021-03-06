<?php

use Illuminate\Support\Facades\Route;
use Techlink\Blog\Http\Controllers\AuthCommentController;
use Techlink\Blog\Http\Controllers\AuthCategoryController;
use Techlink\Blog\Http\Controllers\AuthPostController;
use Techlink\Blog\Http\Controllers\CategoryController;
use Techlink\Blog\Http\Controllers\PostController;
use Techlink\Blog\Http\Controllers\PageController;



//post routes
Route::as('posts.')->group(function() {
    Route::get('posts', [PostController::class, 'index'])->name('index');
    Route::get('posts/{post:id}-{slug}', [PostController::class, 'show'])->name('show');

    Route::as('auth.')->middleware('auth')->prefix('auth')->group(function() {
        Route::get('posts', [AuthPostController::class, 'index'])->name('index');
        Route::get('posts/create', [AuthPostController::class, 'create'])->name('create');
        Route::get('posts/{post:id}/edit', [AuthPostController::class, 'edit'])->name('edit');
        Route::post('posts', [AuthPostController::class, 'store'])->name('store');
        Route::delete('posts/{post:id}', [AuthPostController::class, 'destroy'])->name('destroy');
        Route::put('posts/{post:id}', [AuthPostController::class, 'update'])->name('update');
    });
});

//category routes
Route::as('categories.')->group(function() {
   Route::get('categories/{category:id}-{slug}', [CategoryController::class, 'show'])->name('show');

   //grouping auth routes
   Route::as('auth.')->middleware('auth')->prefix('auth')->group(function() {
       Route::get('categories', [AuthCategoryController::class, 'index'])->name('index');
       Route::get('categories/create', [AuthCategoryController::class, 'create'])->name('create');
       Route::get('categories/{category}/edit', [AuthCategoryController::class, 'edit'])->name('edit');
       Route::post('categories', [AuthCategoryController::class, 'store'])->name('store');
       Route::delete('categories/{category:id}', [AuthCategoryController::class, 'destroy'])->name('destroy');
       Route::put('categories/{category}', [AuthCategoryController::class, 'update'])->name('update');
   });
});

//comment routes
Route::as('comments.')->group(function() {

    Route::as('auth.')->middleware('auth')->prefix('auth')->group(function() {
        Route::get('comments', [AuthCommentController::class, 'index'])->name('index');
        Route::post('comments/{post}', [AuthCommentController::class, 'store'])->name('store');
        Route::delete('comments/{comment:id}', [AuthCommentController::class, 'destroy'])->name('destroy');
    });
});


//page routes
Route::as('pages.')->group(function() {
    Route::get('{page}', PageController::class)->name('show');
});
