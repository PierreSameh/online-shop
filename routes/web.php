<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', [HomeController::class,'index'])->name('home.index');

Route::get('redirect', [HomeController::class, 'redirect'])->name('redirect.dashboard');

Route::get('/category', [AdminController::class, 'categoryIndex'])->name('category.index');