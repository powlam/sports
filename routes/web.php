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

Route::get('/', [GuestController::class, 'welcome'])->name('home');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/sports/{sport}/destroy', [SportController::class, 'confirm'])->name('sports.confirm');
    Route::resource('sports', SportController::class);
    
    Route::get('/championships/{championship}/destroy', [ChampionshipController::class, 'confirm'])->name('championships.confirm');
    Route::resource('championships', ChampionshipController::class);
});
