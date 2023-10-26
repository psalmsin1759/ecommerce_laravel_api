<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
                'title' => $this->faker->word,
                'subtitle' => $this->faker->word,
                'sort_order' => $this->faker->numberBetween(0, 100),
                'image_path' => $this->faker->imageUrl(), 
          
        ];
    }
}
