<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth extends Auth
{
    const IS_ADMIN = 1;

    /**
     * Handle an incoming request from login page.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response|Redirect
     */
    public function handle(Request $request, Closure $next): Response|Redirect
    {
        return self::isAdminUser()
            ? $next($request)
            : Redirect::route('app.index');
    }

    /**
     * Check if user role is admin
     *
     * @return bool
     */
    public static function isAdminUser(): bool
    {
        $user = Auth::user();

        if (empty($user) || $user->role_id !== self::IS_ADMIN) {
            return false;
        }
        return true;
    }
}
