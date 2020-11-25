<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\ProductCategory;

class RestaurantsViewController extends Controller
{
    public function restaurantsPage(Request $request)
    {
        $restaurants = Restaurant::select('id','name','photo','logo')->with('categories', 'ratings', 'deliveryZones');

        if ($request->input('zip')) {
            $zip = $request->input('zip');

            $restaurants->whereHas('deliveryZones', function($query) use ($zip) {
                $query->where('delivery_zones.postal_code', $zip);
            });
        }

        $restaurants = $restaurants->get();

        foreach($restaurants as $restaurant) {
            $restaurant->average_rating = round($restaurant->ratings->avg('score'), 2);
            $restaurant->number_of_ratings = $restaurant->ratings->count();
            $restaurant->price_delivery = round($restaurant->deliveryZones->avg('delivery_price'), 2);
            $restaurant->min_order_price = round($restaurant->deliveryZones->avg('min_order_price'), 2);
            $restaurant->min_delivery_time = $restaurant->deliveryZones->min('delivery_time');
            $restaurant->max_delivery_time = $restaurant->deliveryZones->max('delivery_time');
        }

        $address = $request->input('address') ? $request->input('address') : "Address not found";

        return view('restaurants.restaurants-page', ['address' => $address, 'restaurants' => $restaurants, 'categories' => Category::with('restaurants')->get()]);
    }

    public function restaurantPage(Restaurant $restaurant)
    {
        $restaurant->average_rating = round($restaurant->ratings->avg('score'), 2);
        $restaurant->number_of_ratings = $restaurant->ratings->count();
        $restaurant->price_delivery = round($restaurant->deliveryZones->avg('delivery_price'), 2);
        $restaurant->min_order_price = round($restaurant->deliveryZones->avg('min_order_price'), 2);
        $restaurant->min_delivery_time = $restaurant->deliveryZones->min('delivery_time');
        $restaurant->max_delivery_time = $restaurant->deliveryZones->max('delivery_time');

        $restaurant->load('categories', 'productCategories', 'productCategories.products', 'deliveryZones', 'schedules');

        return view('restaurants.restaurant-page', ['restaurant' => $restaurant]);
    }
}

