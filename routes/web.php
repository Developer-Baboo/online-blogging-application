<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category');
    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('add-category');

    Route::post('store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('store');
    // Route::post('store', function () {
    //     dd("working");
    // })->name('store');
});
