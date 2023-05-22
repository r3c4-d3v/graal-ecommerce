<?php

namespace Tests\Unit\Admin;

use App\Models\Role;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthAdminControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_can_be_rendered(): void
    {
        $response = $this->get(route('admin.login.page'));

        $response->assertStatus(200);
    }

    public function test_admin_verified_can_be_authenticated(): void
    {
        $this->actingAs($this->verifiedAdminUser);

        $response = $this->post($this->LOGIN_SUBMIT_ROUTE, [
            'email' => $this->verifiedAdminUser->email,
            'password' => 'password'
        ]);

        $this->assertAuthenticatedAs($this->verifiedAdminUser);

        $response->assertRedirect($this->DASHBOARD_ROUTE);
    }

    public function test_admin_not_verified_cannot_be_authenticated(): void
    {
        $this->actingAs($this->notVerifiedAdminUser);

        $response = $this->post($this->LOGIN_SUBMIT_ROUTE, [
            'email' => $this->notVerifiedAdminUser->email,
            'password' => 'password'
        ]);

        $this->assertAuthenticatedAs($this->notVerifiedAdminUser);

        $response->assertRedirect(route('verification.notice'));
    }

    public function test_authenticated_admin_can_logout(): void
    {
        $this->actingAs($this->verifiedAdminUser);

        $response = $this->post($this->LOGIN_SUBMIT_ROUTE, [
            'email' => $this->verifiedAdminUser->email,
            'password' => 'password'
        ]);

        $this->assertAuthenticatedAs($this->verifiedAdminUser);

        $response->assertRedirect($this->DASHBOARD_ROUTE);

        $logoutResponse = $this->post(route('admin.logout'));

        $logoutResponse->assertRedirect(route('app.index'));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->DASHBOARD_ROUTE = route('admin.dashboard');
        $this->LOGIN_SUBMIT_ROUTE = route('admin.login.submit');

        $this->adminRole = Role::factory()->create([
            'name' => 'admin'
        ]);

        $this->faker = Faker::create();

        $this->verifiedAdminUser = User::factory()->create([
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'email_verified_at' => now(),
            'role_id' => $this->adminRole->id,
            'password' => Hash::make('password'),
        ]);

        $this->notVerifiedAdminUser = User::factory()->create([
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'email_verified_at' => null,
            'role_id' => $this->adminRole->id,
            'password' => Hash::make('password'),
        ]);
    }
}
