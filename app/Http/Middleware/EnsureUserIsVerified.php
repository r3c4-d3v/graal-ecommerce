<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class EnsureUserIsVerified
{
    /**
     * Specify the redirect route for the middleware.
     *
     * @param string $route
     *
     * @return string
     */
    public static function redirectTo(string $route): string
    {
        return static::class . ':' . $route;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string|null $redirectToRoute
     *
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $redirectToRoute = null)
    {
        $isUserVerified = (bool)($request->user() instanceof MustVerifyEmail && !$request->user()->hasVerifiedEmail());
        if (!$request->user() || !$isUserVerified) {
            return Redirect::route('verification.notice');
        }

        return $next($request);
    }
}
