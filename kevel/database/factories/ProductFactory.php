<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
            'name'         => fake()->words(3, true),
            'description'  => fake()->sentence(),
            'price'        => fake()->randomFloat(2, 5000, 50000000), // Rp 5.000 – Rp 50.000.000
            'status'       => fake()->randomElement(['new', 'used']),
            'is_active'    => fake()->boolean(80),
            'release_date' => fake()->optional(0.7)->date(), // 70% chance of having a date
        ];
    }
}
