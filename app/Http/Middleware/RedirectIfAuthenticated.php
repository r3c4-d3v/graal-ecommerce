<?php

namespace App\Http\Middleware;

use App\Helpers\Util;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @param string ...$guards
     *
     * @return Response
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (Util::isAdminUser(Auth::user())) {
                    return redirect()->route('admin.dashboard');
                }elseif (Util::isGuestUser(Auth::user())) {
                    return redirect()->route('app.index');
                }
            }
        }

        return $next($request);
    }
}
