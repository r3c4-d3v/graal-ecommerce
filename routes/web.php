<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

const ADMIN_PREFIX = '/admin';
const PROFILE = '/profile';
const PRODUCT = '/product';
const CATEGORY = '/category';

# Public Routes
Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

# Admin Routes
Route::middleware(['admin.auth', 'verified'])->group(function () {
    Route::prefix(ADMIN_PREFIX)->group(function () {

        # Dashboard
        Route::get('/dashboard', function () {
            return Inertia::render('Admin/Dashboard');
        })->name('admin.dashboard');

        # Profile edit
        Route::get(PROFILE, [ProfileController::class, 'edit'])
            ->name('admin.profile.edit');

        # Profile update
        Route::patch(PROFILE, [ProfileController::class, 'update'])
            ->name('admin.profile.update');

        # Profile delete
        Route::delete(PROFILE, [ProfileController::class, 'destroy'])
            ->name('admin.profile.destroy');

        # Product index
        Route::get(PRODUCT, [ProductController::class, 'index'])
            ->name('admin.product.index');

        # Product store
        Route::post(PRODUCT, [ProductController::class, 'store'])
            ->name('admin.product.store');

        # Category
        Route::get(CATEGORY, [ProductCategoryController::class, 'index'])
            ->name('admin.category.index');

        # Category store
        Route::post(CATEGORY, [ProductCategoryController::class, 'store'])
            ->name('admin.category.store');
    });
});

# Customer Routes
Route::get('/', [CustomerController::class, 'index'])
    ->name('customer.index');

require_once __DIR__ . '/auth.php';
