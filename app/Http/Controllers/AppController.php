<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class AppController extends Controller
{
    public function index(): InertiaResponse
    {
        return Inertia::render('App/Home', [
            'canLogin' => true,
            'canRegister' => true,
            'isAuthenticated' => (bool)Auth::user(),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'productCategories' => ProductCategory::all(),
            'products' => Product::all(),
        ]);
    }

    public function notFound(): InertiaResponse
    {
        return Inertia::render('404');
    }
}
