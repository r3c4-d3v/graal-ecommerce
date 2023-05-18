<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

# Admin Routes
Route::middleware(['admin.auth', 'verified'])->group(function () {
    Route::prefix('/admin')->group(function () {

        # Dashboard
        Route::get('/dashboard', function () {
            return Inertia::render('Admin/Dashboard');
        })->name('admin.dashboard');

        # Profile edit
        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('admin.profile.edit');

        # Profile update
        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('admin.profile.update');

        # Profile delete
        Route::delete('/profile', [ProfileController::class, 'destroy'])
            ->name('admin.profile.destroy');

        # Product index
        Route::get('/product', [ProductController::class, 'index'])
            ->name('admin.product.index');

        # Product store
        Route::post('/product', [ProductController::class, 'store'])
            ->name('admin.product.store');

        # Category
        Route::get('/category', [ProductCategoryController::class, 'index'])
            ->name('admin.category.index');

        # Category store
        Route::post('/category', [ProductCategoryController::class, 'store'])
            ->name('admin.category.store');
    });
});

# App Routes
Route::get('/', [AppController::class, 'index'])
    ->name('app.index');

# Public Routes
Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'store']);


require_once __DIR__ . '/auth.php';
