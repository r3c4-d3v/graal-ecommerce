<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::get('/', function () {
//    return Inertia::render('Customer/Home', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::middleware(['admin.auth', 'verified'])->group(function () {
    # Admin
    Route::prefix('/admin')->group(function () {
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

# Customer Routes
Route::get('/', [CustomerController::class, 'index'])
    ->name('customer.index');

Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

require __DIR__ . '/auth.php';
