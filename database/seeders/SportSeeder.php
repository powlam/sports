<?php

namespace Database\Seeders;

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
