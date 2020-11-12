<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Category;

class RestaurantsViewController extends Controller
{
    public function restaurantsPage()
    {
        $zip = $request->input('zip')
        $restaurants = Restaurant::select('id','name','photo','logo')->with('categories', 'ratings', 'deliveryZones')->get();

        foreach($restaurants as $restaurant) {
            $restaurant->average_rating = $restaurant->ratings->avg('score');
            $restaurant->number_of_ratings = $restaurant->ratings->count();
            $restaurant->price_delivery = $restaurant->deliveryZones->avg('delivery_price');
            $restaurant->min_order_price = $restaurant->deliveryZones->avg('min_order_price');
            $restaurant->min_delivery_time = $restaurant->deliveryZones->min('min_order_price');
            $restaurant->max_delivery_time = $restaurant->deliveryZones->max('min_order_price');
        }
        //return $restaurants;
        return view('restaurants.restaurants-page', ['address' => 'Carrer Congrés, 08031 Barcelona', 'restaurants' => $restaurants]);
    }

    public function restaurantPage(Restaurant $restaurant)
    {
        return view('restaurants.restaurant-page', ['restaurant' => $restaurant]);
    }
}

