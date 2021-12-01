<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Models\SportDiscipline;
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
}
