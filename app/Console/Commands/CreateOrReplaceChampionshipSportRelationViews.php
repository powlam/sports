<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateOrReplaceChampionshipSportRelationViews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'view:CreateOrReplaceChampionshipSportRelationViews';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create or Replace SQL Views: edition_disciplines, edition_sports, championship_events, championship_disciplines and championship_sports';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::statement("
            CREATE OR REPLACE VIEW edition_disciplines 
            AS
            SELECT
                tournaments.championship_edition_id,
                sport_events.sport_discipline_id
            FROM
                tournaments
                LEFT JOIN sport_events ON tournaments.sport_event_id = sport_events.id
            GROUP BY championship_edition_id, sport_discipline_id
        ");

        DB::statement("
            CREATE OR REPLACE VIEW edition_sports 
            AS
            SELECT
                tournaments.championship_edition_id,
                sport_disciplines.sport_id
            FROM
                tournaments
                LEFT JOIN sport_events ON tournaments.sport_event_id = sport_events.id
                LEFT JOIN sport_disciplines ON sport_events.sport_discipline_id = sport_disciplines.id
            GROUP BY championship_edition_id, sport_id
        ");

        DB::statement("
            CREATE OR REPLACE VIEW championship_events 
            AS
            SELECT
                championship_editions.championship_id,
                tournaments.sport_event_id
            FROM
                tournaments
                LEFT JOIN championship_editions ON tournaments.championship_edition_id = championship_editions.id
            GROUP BY championship_id, sport_event_id
        ");

        DB::statement("
            CREATE OR REPLACE VIEW championship_disciplines 
            AS
            SELECT
                championship_editions.championship_id,
                sport_events.sport_discipline_id
            FROM
                tournaments
                LEFT JOIN championship_editions ON tournaments.championship_edition_id = championship_editions.id
                LEFT JOIN sport_events ON tournaments.sport_event_id = sport_events.id
            GROUP BY championship_id, sport_discipline_id
        ");

        DB::statement("
            CREATE OR REPLACE VIEW championship_sports 
            AS
            SELECT
                championship_editions.championship_id,
                sport_disciplines.sport_id
            FROM
                tournaments
                LEFT JOIN championship_editions ON tournaments.championship_edition_id = championship_editions.id
                LEFT JOIN sport_events ON tournaments.sport_event_id = sport_events.id
                LEFT JOIN sport_disciplines ON sport_events.sport_discipline_id = sport_disciplines.id
            GROUP BY championship_id, sport_id
        ");

        return Command::SUCCESS;
    }
}
