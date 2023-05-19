<?php

use App\Http\Controllers\{Admin\AuthAdminController,
    AppController,
    DashboardController,
    ProductCategoryController,
    ProductController,
    ProfileController};
use App\Http\Controllers\Auth\{ConfirmablePasswordController,
    EmailVerificationNotificationController,
    EmailVerificationPromptController,
    PasswordController,
    RegisteredUserController,
    VerifyEmailController};
use Illuminate\Support\Facades\{Mail, Route};


Route::fallback(function () {
    return redirect()->route('404');
});

/**
 * Public Routes
 */
Route::get('/', [AppController::class, 'index'])
    ->name('app.index');

Route::get('/404', [AppController::class, 'notFound'])
    ->name('404');

/**
 * Admin Routes
 */
Route::get('admin/login', [AuthAdminController::class, 'renderLoginPage'])
    ->name('admin.login.page');

Route::post('admin/login', [AuthAdminController::class, 'login'])
    ->name('admin.login.submit');

Route::post('admin/logout', [AuthAdminController::class, 'destroy'])
    ->name('admin.logout');

Route::get('admin/dashboard', [AuthAdminController::class, 'renderDashboardPage'])
    ->middleware('redirectIfNotAdmin')
    ->name('admin.dashboard');

Route::get('admin/profile', [ProfileController::class, 'edit'])
    ->middleware(['redirectIfNotAdmin'])
    ->name('admin.profile.edit');

Route::patch('admin/profile', [ProfileController::class, 'update'])
    ->middleware(['redirectIfNotAdmin'])
    ->name('admin.profile.update');

Route::delete('admin/profile', [ProfileController::class, 'destroy'])
    ->middleware(['redirectIfNotAdmin'])
    ->name('admin.profile.destroy');

Route::get('admin/product', [ProductController::class, 'index'])
    ->middleware(['redirectIfNotAdmin'])
    ->name('admin.product.index');

Route::post('admin/product', [ProductController::class, 'store'])
    ->name('admin.product.store');

Route::get('admin/category', [ProductCategoryController::class, 'index'])
    ->middleware(['redirectIfNotAdmin'])
    ->name('admin.category.index');

Route::post('admin/category', [ProductCategoryController::class, 'store'])
    ->name('admin.category.store')
    ->middleware('AdminAuthenticat;ion');

/**
 * Guest Routes
 */
Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('admin.register.page');

Route::post('register', [RegisteredUserController::class, 'store'])
    ->middleware('redirectIfAuthenticated')
    ->name('register.submit');


/**
 * Email Routes
 */
Route::get('verify-email', EmailVerificationPromptController::class)
    ->name('verification.notice');

Route::get('verify-email/{id}/{hash};', VerifyEmailController::class)
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware('auth', 'throttle:6,1')
    ->name('verification.send');

Route::get('/test-email', function () {
    $to = 'vinicius.rech.dev@gmail.com';
    $subject = 'Test Email';
    $message = 'This is a test email from Laravel';

    Mail::raw($message, function ($email) use ($to, $subject) {
        $email->to($to)->subject($subject);
    });

    return 'Test email sent successfully!';
});

/**
 * Password Routes
 */
Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware('auth')
    ->name('password.confirm');

Route::post('confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware('auth')
    ->name('password.confirm.store');

Route::put('password', [PasswordController::class, 'update'])
    ->middleware('auth')
    ->name('password.update');
