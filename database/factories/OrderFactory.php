<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'payment_method' => $this->faker->randomElement(['Credit Card', 'PayPal', 'Cash']),
            'total_price' => $this->faker->randomFloat(2, 10, 500),
            'tax' => $this->faker->randomFloat(2, 0, 50),
            'status' => $this->faker->randomElement(['Pending', 'Shipped', 'Delivered']),
            'discount' => $this->faker->randomFloat(2, 0, 20),
            'currency' => $this->faker->currencyCode,
            'shipping_price' => $this->faker->randomFloat(2, 0, 30),
            'shipping_address' => $this->faker->address,
            'shipping_city' => $this->faker->city,
            'shipping_state' => $this->faker->state,
            'shipping_country' => $this->faker->country,
        ];
    }
}
