<?php

namespace Database\Factories;

use App\Models\SportDiscipline;
use Illuminate\Database\Eloquent\Factories\Factory;

class SportEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $disciplineIds = SportDiscipline::all()->pluck('id');
        return [
            'sport_discipline_id' => $this->faker->randomElement($disciplineIds),
            'default' => $this->faker->boolean(20),
            'name' => $this->faker->word(),
            'description' => $this->faker->text(500),
        ];
    }
}
