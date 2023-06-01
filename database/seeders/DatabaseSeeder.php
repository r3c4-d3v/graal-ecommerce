<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Role;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        $adminRole = Role::factory()->create([
            'name' => 'admin'
        ]);

        $guestRole = Role::factory()->create([
            'name' => 'guest'
        ]);

        User::factory()->create([
            'name' => 'Rech',
            'email' => 'admin@admin.com',
            'role_id' => $adminRole->id,
            'password' => Hash::make("123")
        ]);

        User::factory()->create([
            'name' => 'Vinicius',
            'email' => 'guest@guest.com',
            'role_id' => $guestRole->id,
            'password' => Hash::make("123")
        ]);

        ProductCategory::factory(10)->create();

        Product::factory(100)->create();
    }
}
