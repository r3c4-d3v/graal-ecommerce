<?php

namespace App\Http\Middleware;

use App\Helpers\Helpers;
use App\Helpers\Util;
use Closure;
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

        return Util::isAdminUser($user)
            ? $next($request)
            : Redirect::route('app.index');
    }
}
