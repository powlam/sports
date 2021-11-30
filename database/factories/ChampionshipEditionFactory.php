<?php

namespace Database\Factories;

use App\Models\Championship;
use App\Models\ChampionshipEdition;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChampionshipEditionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $championshipIds = Championship::all()->pluck('id');
        return [
            'championship_id' => $this->faker->randomElement($championshipIds),
            'name' => $this->faker->sentence(3),
            'edition' => $this->faker->numberBetween(1, 75),
            'notes' => $this->faker->text(500),
            'start' => $this->faker->dateTime(),
            'end' => $this->faker->dateTime(),
            'state' => $this->faker->randomElement(array_keys(ChampionshipEdition::$states)),
            'location' => $this->faker->country(),
            'notes' => $this->faker->text(500),
        ];
    }
}
