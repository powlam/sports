<?php

use App\Models\ChampionshipEdition;
use App\Models\Tournament;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('championship_edition_id');
            $table->foreignId('sport_event_id');
            $table->enum('genre', array_keys(Tournament::$genres))->default('M');
            $table->enum('type', Tournament::$types);
            $table->enum('state', array_keys(ChampionshipEdition::$states))->nullable();

            $table->unique(['championship_edition_id', 'sport_event_id', 'genre']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournaments');
    }
}
