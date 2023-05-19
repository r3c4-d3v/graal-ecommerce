<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Contracts\Foundation\Application as FoundationApplication;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class AuthAdminController extends Controller
{
    /**
     * @return InertiaResponse
     */
    public function renderLoginPage(): InertiaResponse
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status')
        ]);
    }

    public function renderDashboardPage(): InertiaResponse
    {
        return Inertia::render('Admin/Dashboard');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (isUserVerified(Auth::user())) {
            return redirect()->intended('admin.dashboard');
        }

        return Redirect::route('verification.notice');
    }

    /**
     * Logout admin user
     * @param Request $request
     * @return Application|Redirector|RedirectResponse|FoundationApplication
     */
    public function destroy(Request $request): Application|Redirector|RedirectResponse|FoundationApplication
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('app.index');
    }
}
