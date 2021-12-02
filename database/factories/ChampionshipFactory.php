<?php

namespace Database\Factories;

use App\Models\Championship;
use App\Models\Sport;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChampionshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'scope' => $this->faker->randomElement(Championship::$scopes),
            'location' => $this->faker->country(),
            'notes' => $this->faker->text(500),
        ];
    }
}
