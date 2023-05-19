<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        $previousUrl = url()->previous();
        $routePrefix = Route::getFacadeRoot()->current()->getPrefix();

        if ($previousUrl == route('admin.login.submit')) {
            return $next($request);
        }

        if (Request::create($previousUrl)->is($routePrefix)) {
            return $next($request);
        }

        if (Auth::check() && isAdmin($user)) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return $next($request);
    }
}
