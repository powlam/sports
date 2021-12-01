<?php

namespace Database\Factories;

use App\Models\Sport;
use Illuminate\Database\Eloquent\Factories\Factory;

class SportDisciplineFactory extends Factory
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
            'default' => $this->faker->boolean(20),
            'name' => $this->faker->word(),
        ];
    }
}
