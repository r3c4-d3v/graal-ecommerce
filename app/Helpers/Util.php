<?php

namespace App\Helpers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

//@TODO refactor to functions instead a class
class Util
{
    private const IS_ADMIN = 1;
    private const IS_GUEST = 2;

    /**
     * Convert masked string currency to float currency
     *
     * @param string $currency
     *
     * @return float
     */
    public static function stringToCurrency(string $currency): float
    {
        $convertedCurrency = preg_replace(
            '/^(R\$\s*|\s+|\.)/',
            '',
            $currency
        );

        return floatval((int)$convertedCurrency / 100);
    }

    public static function isGuestUser($user): bool
    {
        if ($user->role_id !== self::IS_GUEST) {
            return false;
        }
        return true;
    }

    /**
     * @param $user
     * @param $next
     * @param $request
     * @return RedirectResponse
     */
    public static function redirectByRole($user, $next, $request): RedirectResponse
    {
        if (self::isAdminUser($user)) {
            return Redirect::route('admin.dashboard');
        }

        if ($request->session()->previousUrl() === route('admin.dashboard')) {
            return Redirect::route('app.index');
        }

        return $next($request);
    }

    /**
     * Check if user role is admin
     *
     * @param $user
     *
     * @return bool
     */
    public static function isAdminUser($user): bool
    {
        if ($user->role_id !== self::IS_ADMIN) {
            return false;
        }
        return true;
    }
}





