<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantsViewController extends Controller
{
    public function restaurantsPage()
    {
        return view('restaurants.restaurants-page', ['address' => 'Carrer Congrés, 08031 Barcelona']);
    }

    public function restaurantPage(Restaurant $restaurant)
    {
        return view('restaurants.restaurant-page', ['restaurant' => $restaurant]);
    }
}

