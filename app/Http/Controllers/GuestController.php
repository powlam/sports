<?php

namespace App\Http\Controllers;

use App\Models\Championship;
use App\Models\ChampionshipEdition;
use App\Models\Sport;
use App\Models\SportDiscipline;
use App\Models\SportEvent;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function welcome()
    {
        return view('welcome');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function sport(Sport $sport)
    {
        return view('guest.sport', compact('sport'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function sportDiscipline(SportDiscipline $sportDiscipline)
    {
        return view('guest.sportDiscipline', compact('sportDiscipline'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function sportEvent(SportEvent $sportEvent)
    {
        return view('guest.sportEvent', compact('sportEvent'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function championship(Championship $championship)
    {
        return view('guest.championship', compact('championship'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function championshipEdition(ChampionshipEdition $championshipEdition)
    {
        return view('guest.championshipEdition', compact('championshipEdition'));
    }

}
