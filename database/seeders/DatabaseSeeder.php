<?php

namespace Database\Seeders;

use App\Models\ChampionshipEdition;
use App\Models\SportEvent;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            SportSeeder::class,
        ]);

        \App\Models\SportDiscipline::factory(10)
            ->has(
                SportEvent::factory(5)
                    ->hasLogo()
            )
            ->hasLogo()
            ->create();

        \App\Models\Championship::factory(10)
            // ->hasChampionshipEditions(5)
            ->has(
                ChampionshipEdition::factory(5)
                    ->hasLogo()
            )
            ->hasLogo()
            ->create();

        \App\Models\Tournament::factory(20)
            ->hasLogo()
            ->create();
    }
}
