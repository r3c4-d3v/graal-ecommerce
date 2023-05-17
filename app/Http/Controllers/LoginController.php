<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class LoginController extends Controller
{
    public function index(): InertiaResponse
    {
        return Inertia::render('Auth/Login');
    }
}
