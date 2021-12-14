<?php

namespace App\Providers;

use App\Models\Championship;
use App\Models\ChampionshipEdition;
use App\Models\Sport;
use App\Models\SportDiscipline;
use App\Models\SportEvent;
use App\Models\Tournament;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Custom Polymorphic Types
        Relation::enforceMorphMap([
            'sport' => Sport::class,
            'discipline' => SportDiscipline::class,
            'event' => SportEvent::class,
            'championship' => Championship::class,
            'edition' => ChampionshipEdition::class,
            'tournament' => Tournament::class,
        ]);
    }
}
