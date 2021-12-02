<?php

namespace Database\Seeders;

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
            ->hasSportEvents(5)
            ->create();

        \App\Models\Championship::factory(10)
            ->hasChampionshipEditions(5)
            ->create();

        \App\Models\Tournament::factory(20)
            ->create();
    }
}
