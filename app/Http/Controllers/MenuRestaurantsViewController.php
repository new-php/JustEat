<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class MenuRestaurantsViewController extends Controller
{
    public function menuRestaurantsPage()
    {
        $products = Product::select('id','restaurant_id','name','price')->with('product_product_category','product_categories')->get();

        /*foreach($products as $product) {
            $product->restaurant_id = $restaurant->products->avg('restaurant_id');
        }*/

        return view('menuRestaurant', ['restaurant' => 'Pans & Company', 'address' => 'Carrer Congrés, 08031 Barcelona', 'products' => $products]);
    }
}
