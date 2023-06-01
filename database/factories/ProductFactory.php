<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ucfirst($this->faker->sentence(2)),
            'slug' => $this->faker->slug(),
            'description' => ucfirst($this->faker->sentence(5)),
            'price' => $this->faker->randomFloat(1, 20, 90),
            'image_url' => $this->faker->imageUrl(640, 480, 'food'),
            'category_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
