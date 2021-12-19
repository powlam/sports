<?php

namespace Database\Factories;

use App\Models\ChampionshipEdition;
use App\Models\SportEvent;
use App\Models\Tournament;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $championshipEditionIds = ChampionshipEdition::all()->pluck('id');
        $sportEventIds = SportEvent::all()->pluck('id');
        return [
            'championship_edition_id' => $this->faker->randomElement($championshipEditionIds),
            'sport_event_id' => $this->faker->randomElement($sportEventIds),
            'genre' => $this->faker->randomElement(array_keys(Tournament::$genres)),
            'type' => $this->faker->randomElement(Tournament::$types),
            'state' => $this->faker->randomElement(array_keys(Tournament::$states)),
        ];
    }
}
