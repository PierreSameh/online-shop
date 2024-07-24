<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;


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

// Categories

// Category Page in Admin Dashboard
Route::get('/category', [AdminController::class, 'categoryIndex'])->name('category.index');
// Add a new Category
Route::post('/category/add', [AdminController::class, 'categoryStore'])->name('category.store');
// Delete a Category
Route::delete('/category/{category}', [AdminController::class, 'categoryDelete'])->name('category.delete');

// Products

// Show Products in Admin Dashboard
Route::get('/products', [ProductController::class,'productIndex'])->name('product.index');
// Add Products page in Admin Dashboard
Route::get('/product/create', [ProductController::class,'productCreate'])->name('product.create');