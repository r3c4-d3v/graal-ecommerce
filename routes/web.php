<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('UserDashboard/Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//Route::get('/app', function () {
//    return Inertia::render('UserDashboard/Dashboard');
//})->middleware(['guest', 'verified'])->name('dashboard');

Route::get('/admin', function () {
    return Inertia::render('Admin/Dashboard', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->middleware(['auth', 'verified'])->name('admin.dashboard');



Route::middleware('auth')->group(function () {
    # Profile
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');

    # Product
    Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product.index');
    Route::post('/admin/product', [ProductController::class, 'store'])->name('admin.product.store');

    # Category
    Route::get('/admin/category', [ProductCategoryController::class, 'index'])->name('admin.category.index');
    Route::post('/admin/category', [ProductCategoryController::class, 'store'])->name('admin.category.store');
});

require __DIR__ . '/auth.php';
