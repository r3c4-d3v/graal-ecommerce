<?php

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

const IS_ADMIN = 1;

/**
 * @param Authenticatable|null $user
 * @return bool
 */
function isAdmin(Authenticatable|null $user): bool
{
    return ($user?->role_id === IS_ADMIN);
}

/**
 * @param $user
 * @return bool
 */
function isUserVerified($user): bool
{
    return ($user instanceof MustVerifyEmail && $user->hasVerifiedEmail());
}
