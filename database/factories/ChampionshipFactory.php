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
        $sportIds = Sport::all()->pluck('id');
        return [
            'sport_id' => $this->faker->randomElement($sportIds),
            'name' => $this->faker->sentence(3),
            'genre' => $this->faker->randomElement(array_keys(Championship::$genres)),
            'type' => $this->faker->randomElement(Championship::$types),
            'scope' => $this->faker->randomElement(Championship::$scopes),
            'location' => $this->faker->country(),
            'notes' => $this->faker->text(500),
        ];
    }
}
