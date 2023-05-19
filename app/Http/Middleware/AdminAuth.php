<?php

namespace App\Http\Middleware;

use App\Helpers\Helpers;
use App\Helpers\Util;
use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth extends Auth
{
    /**
     * Handle an incoming request from login page.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response|Redirect
     */
    public function handle(Request $request, Closure $next): Response|Redirect
    {
        $user = Auth::user();

        $isUserVerified = (bool)($user instanceof MustVerifyEmail && !$user->hasVerifiedEmail());
        if (!$user || !$isUserVerified) {
            return Redirect::route('verification.notice');
        }

        return Util::isAdminUser($user)
            ? $next($request)
            : Redirect::route('app.index');
    }
}
