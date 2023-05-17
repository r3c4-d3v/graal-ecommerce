<?php

namespace Tests\Feature;

use App\Http\Controllers\LoginController;
use Inertia\Testing\Assert;
use PHPUnit\Framework\TestCase;

class LoginControllerTest extends TestCase
{

    public function testIndex()
    {
        $loginController = new LoginController();

        $response = $loginController->index();

        $response->assertInertia(fn (Assert $page) => $page->component('Auth/Login'));
    }
}
