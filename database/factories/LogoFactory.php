<?php

namespace Database\Factories;

use App\Models\Logo;
use Illuminate\Database\Eloquent\Factories\Factory;

class LogoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fake_image_path = $this->faker->image(null, 32, 32, 'sports');
        return [
            'image' => Logo::convertImageForDatabase($fake_image_path),
        ];
    }
}
