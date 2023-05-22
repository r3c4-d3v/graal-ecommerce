<?php

namespace App\Http\Middleware;

use App\Helpers\Util;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response|Closure
     */
    public function handle(Request $request, Closure $next): Response | Closure
    {
        if (!isAdmin(Auth::user())) {
            return Redirect::route('app.index');
        }

        return $next($request);
    }
}
