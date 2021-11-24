<?php

use App\Http\Controllers\AppController;
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

Route::get('/', [AppController::class, 'welcome'])->name('home');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/sports/{sport}/destroy', [SportController::class, 'confirm'])->name('sports.confirm');
    Route::resource('sports', SportController::class);
});
