<?php

namespace App\Http\Controllers;

use App\Models\Championship;
use App\Models\Sport;
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
    public function championship(Championship $championship)
    {
        return view('guest.championship', compact('championship'));
    }
}
