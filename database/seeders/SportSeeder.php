<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SportSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sports')->insert($this->getSports());

        foreach (Sport::all() as $sport) {
            $sport->logo()->save(
                \App\Models\Logo::factory(1)->create([
                    'logoable_id' => $sport->id,
                    'logoable_type' => $sport->getMorphClass(),
                ])->first()
            );
        }
    }

    private function getSports(): array
    {
        $sportRows = [];
        foreach ([
            'football',
            'basketball',
            'cycling',
        ] as $v) {
            $sportRows[] = ['name' => $v];
        }
        return $sportRows;
    }
}
