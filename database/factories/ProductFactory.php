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
            'name' => $this->faker->word,
            'sku' => $this->faker->unique()->regexify('[A-Za-z0-9]{10}'),
            'quantity' => $this->faker->numberBetween(10, 100),
            'in_stock' => $this->faker->numberBetween(5, 50),
            'featured' => $this->faker->numberBetween(0, 1),
            'new_arrival' => $this->faker->numberBetween(0, 1),
            'sort_order' => $this->faker->numberBetween(0, 100),
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(2, 10, 500),
            'discounted_price' => $this->faker->randomFloat(2, 5, 400),
            'cost_price' => $this->faker->randomFloat(2, 5, 300),
            'status' => $this->faker->randomElement(['Selling', 'Not Selling Yet']),
        ];
    }
}
