<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
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
            'phone' => $this->faker->phoneNumber,
            'password' => bcrypt('password'),
            'code' => $this->faker->unique()->numerify('CODE####'),
            'status' => $this->faker->randomElement([0, 1]), 
    
            'address' => $this->faker->streetAddress,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
    
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
