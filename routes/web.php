<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
// use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\FrontendController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index']);
Route::get('tutorial/{category_slug}', [FrontendController::class, 'viewCategoryPost']);
Route::get('tutorial/{category_slug}/{post_slug}', [FrontendController::class, 'viewPost']);

// Comment System
// Route::post('comments', [CommentController::class, 'store']);
Route::post('comments', [CommentController::class, 'store']);

Route::post('delete-comment', [CommentController::class, 'destroy']);



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category');

    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('add-category');

    Route::post('store-category', [App\Http\Controllers\Admin\CategoryController::class, 'store_category'])->name('store-category');

    Route::get('edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit');

    Route::patch('update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('update');

    Route::delete('delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('delete');



    // Post Controller Routes

    Route::get('view-post', [PostController::class, 'index'])->name('view-post');

    Route::get('add-post', [PostController::class, 'create'])->name('add-post');

    Route::post('store-post', [PostController::class, 'store'])->name('store-post');

    Route::get('edit-post/{id}', [PostController::class, 'edit'])->name('edit-post');

    Route::patch('update-post/{id}', [PostController::class, 'update'])->name('update-post');

    Route::delete('delete-post/{id}', [PostController::class, 'destroy'])->name('delete-post');


    //Get Registered Users

    Route::get('users', [UserController::class, 'index']);

    Route::get('edit-user/{id}', [UserController::class, 'edit'])->name('edit-user');

    Route::PUT('update-user/{id}', [UserController::class, 'update'])->name('update-user');

    Route::get('settings', [SettingController::class, 'index'])->name('settings');

    Route::post('admin/settings', [SettingController::class, 'store'])->name('store');

});
