<?php

use App\Http\Controllers\ChampionshipController;
use App\Http\Controllers\ChampionshipEditionController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\SportDisciplineController;
use App\Http\Controllers\SportEventController;
use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Web site */

Route::name('guest.')
        ->group(function() {

    Route::get('/', [GuestController::class, 'welcome'])->name('home');

    Route::get('/sports/{sport}', [GuestController::class, 'sport'])->name('sport');
    Route::get('/disciplines/{sportDiscipline}', [GuestController::class, 'sportDiscipline'])->name('sportDiscipline');
    Route::get('/events/{sportEvent}', [GuestController::class, 'sportEvent'])->name('sportEvent');

    Route::get('/championships/{championship}', [GuestController::class, 'championship'])->name('championship');
    Route::get('/editions/{championshipEdition}', [GuestController::class, 'championshipEdition'])->name('championshipEdition');

    Route::get('/tournaments/{tournament}', [GuestController::class, 'tournament'])->name('tournament');

});

/* Authentication */

require __DIR__.'/auth.php';

/* Administration site */

Route::middleware(['auth'])
        ->prefix('dashboard')
        ->name('dashboard.')
        ->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('home');
    
    Route::get('/championships/{championship}/destroy', [ChampionshipController::class, 'confirm'])->name('championships.confirm');
    Route::get('/championshipEditions/{championshipEdition}/destroy', [ChampionshipEditionController::class, 'confirm'])->name('championshipEditions.confirm');
    Route::get('/phases/{phase}/destroy', [PhaseController::class, 'confirm'])->name('phases.confirm');
    Route::get('/sports/{sport}/destroy', [SportController::class, 'confirm'])->name('sports.confirm');
    Route::get('/sportDisciplines/{sportDiscipline}/destroy', [SportDisciplineController::class, 'confirm'])->name('sportDisciplines.confirm');
    Route::get('/sportEvents/{sportEvent}/destroy', [SportEventController::class, 'confirm'])->name('sportEvents.confirm');
    Route::get('/tournaments/{tournament}/destroy', [TournamentController::class, 'confirm'])->name('tournaments.confirm');

    Route::resources([
        'championships' => ChampionshipController::class,
        'championshipEditions' => ChampionshipEditionController::class,
        'phases' => PhaseController::class,
        'sports' => SportController::class,
        'sportDisciplines' => SportDisciplineController::class,
        'sportEvents' => SportEventController::class,
        'tournaments' => TournamentController::class,
    ]);
    Route::resource('phases', PhaseController::class)->except(['index']);

});
