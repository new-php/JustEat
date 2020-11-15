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
        $restaurants = Restaurant::select('id','name','photo','logo')->with('categories', 'ratings', 'deliveryZones')->get();

        foreach($restaurants as $restaurant) {
            $restaurant->average_rating = $restaurant->ratings->avg('score');
            $restaurant->number_of_ratings = $restaurant->ratings->count();
            $restaurant->price_delivery = $restaurant->deliveryZones->avg('delivery_price');
            $restaurant->min_order_price = $restaurant->deliveryZones->avg('min_order_price');
            $restaurant->min_delivery_time = $restaurant->deliveryZones->min('delivery_time');
            $restaurant->max_delivery_time = $restaurant->deliveryZones->max('delivery_time');
        }

        $address = $request->input('address') ? $request->input('address') : "Address not found";

        return view('restaurants.restaurants-page', ['address' => $address, 'restaurants' => $restaurants]);
    }

    public function restaurantPage(Restaurant $restaurant)
    {
        $restaurant->average_rating = $restaurant->ratings->avg('score');
        $restaurant->number_of_ratings = $restaurant->ratings->count();
        $restaurant->price_delivery = $restaurant->deliveryZones->avg('delivery_price');
        $restaurant->min_order_price = $restaurant->deliveryZones->avg('min_order_price');

        $restaurant->load('categories', 'products', 'products.productCategories', 'deliveryZones', 'schedules');

        return view('restaurants.restaurant-page', ['restaurant' => $restaurant, 'product_categories' => ProductCategory::all()]);
    }
}

