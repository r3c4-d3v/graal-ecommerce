<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function index(): RedirectResponse
    {
        return Inertia::render('Auth/Login');
    }
}
