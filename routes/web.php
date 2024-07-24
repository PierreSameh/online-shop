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
// Home page index
Route::get('/', [HomeController::class,'index'])->name('home.index');
// User -> User Dashboard & Admin -> Admin Dashboard
Route::get('redirect', [HomeController::class, 'redirect'])->name('redirect.dashboard');
// Category Page in Admin Dashboard
Route::get('/category', [AdminController::class, 'categoryIndex'])->name('category.index');
// Add a new Category
Route::post('/category/add', [AdminController::class, 'categoryStore'])->name('category.store');
// Delete a Category
Route::delete('/category/{category}', [AdminController::class, 'categoryDelete'])->name('category.delete');