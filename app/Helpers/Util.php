<?php

namespace App\Helpers;

class Util
{
    private const IS_ADMIN = 1;

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





