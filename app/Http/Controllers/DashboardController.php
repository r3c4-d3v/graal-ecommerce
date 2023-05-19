<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class DashboardController extends Controller
{
    /**
     * Render Admin dashboard
     * @return InertiaResponse
     */
    public static function index(): InertiaResponse
    {
        return Inertia::render('Admin/Dashboard');
    }
}
