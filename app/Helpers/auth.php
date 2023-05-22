<?php

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

const IS_ADMIN = 1;
const IS_GUEST = 2;

/**
 * Redirect based on user role
 * @param Authenticatable|null $user
 * @return RedirectResponse|null
 */
function redirectByRole(Authenticatable|null $user): RedirectResponse|bool
{


    return match ($user->role_id) {
        IS_ADMIN => Redirect::route('admin.dashboard'),
        IS_GUEST => Redirect::route('app.index'),
        default => false,
    };
}

function isAdmin(Authenticatable|null $user): bool
{
    return ($user->role_id === IS_ADMIN);
}

function isUserVerified($user): bool
{
    return ($user instanceof MustVerifyEmail && $user->hasVerifiedEmail());
}
