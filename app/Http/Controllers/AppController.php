<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function welcome()
    {
        return view('welcome');
    }
}
