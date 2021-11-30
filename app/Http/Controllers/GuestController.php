<?php

namespace App\Http\Controllers;

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
}
