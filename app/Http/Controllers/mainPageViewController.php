<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainPageViewController extends Controller
{
    public function mainPage()
    {
        return view('pagPrincipal');
    }
}
