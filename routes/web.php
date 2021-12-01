<?php

use App\Http\Controllers\ChampionshipController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\SportController;
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

});

/* Authentication */

require __DIR__.'/auth.php';

/* Administration site */

Route::middleware(['auth'])
        ->prefix('dashboard')
        ->name(('dashboard.'))
        ->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('home');
    
    Route::get('/sports/{sport}/destroy', [SportController::class, 'confirm'])->name('sports.confirm');
    Route::resource('sports', SportController::class);
    
    Route::get('/championships/{championship}/destroy', [ChampionshipController::class, 'confirm'])->name('championships.confirm');
    Route::resource('championships', ChampionshipController::class);

});
