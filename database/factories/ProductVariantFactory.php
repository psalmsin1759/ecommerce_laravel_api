<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'option' => $this->faker->randomElement(['Color', 'Size', 'Material']), // You can modify the options
            'value' => $this->faker->word, // Random value
            'quantity' => $this->faker->numberBetween(1, 100),
            'product_id' => function () {
                return Product::inRandomOrder()->first()->id;
            },
        ];

    }


}