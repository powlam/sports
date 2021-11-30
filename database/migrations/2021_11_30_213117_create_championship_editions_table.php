<?php

use App\Models\ChampionshipEdition;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChampionshipEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('championship_editions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('championship_id')->constrained();
            $table->string('name');
            $table->smallInteger('edition')->comment('Edition number')->nullable()->default(1);
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->enum('state', array_keys(ChampionshipEdition::$states))->nullable();
            $table->string('location')->nullable(); // MAYBE relate with location table/s
            $table->string('notes', 500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('championship_editions');
    }
}
