<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantsViewController extends Controller
{
    public function restaurants()
    {
        return view('restaurants.restaurants-page', ['address' => 'Carrer Congrés, 08031 Barcelona']);
    }
}

