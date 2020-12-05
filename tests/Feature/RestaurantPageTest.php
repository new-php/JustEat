<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Rating;
use App\Models\DeliveryZone;

class RestaurantPageTest extends TestCase
{
    /**
     * Assert restaurants view
     *
     * @return void
     */
    public function testRestaurantsPage()
    {
        $category = Category::factory()->create();

        $restaurant = Restaurant::factory()
            ->has(Rating::factory()->count(2))
            ->has(DeliveryZone::factory(['postal_code' => '1234'])->count(2))
            ->create();

        $response = $this->get('/restaurants?zip=1234&address=Address');

        $restaurants = Restaurant::select('id','name','photo','logo')->with('categories', 'ratings', 'deliveryZones')->get();

        foreach($restaurants as $restaurant) {
            $restaurant->average_rating = round($restaurant->ratings->avg('score'), 2);
            $restaurant->number_of_ratings = $restaurant->ratings->count();
            $restaurant->price_delivery = round($restaurant->deliveryZones->avg('delivery_price'), 2);
            $restaurant->min_order_price = round($restaurant->deliveryZones->avg('min_order_price'), 2);
            $restaurant->min_delivery_time = $restaurant->deliveryZones->min('delivery_time');
            $restaurant->max_delivery_time = $restaurant->deliveryZones->max('delivery_time');
        }


        $response->assertStatus(200)
            ->assertViewIs('restaurants.restaurants-page')
            ->assertViewHas('address', 'Address')
            ->assertViewHas('restaurants', $restaurants)
            ->assertViewHas('categories', Category::with('restaurants')->get());
    }

    /**
     * Assert restaurant view
     *
     * @return void
     */
    public function testRestaurantPage()
    {
        $category = Category::factory()->create();

        $restaurant = Restaurant::factory()
            ->has(Rating::factory()->count(2))
            ->has(DeliveryZone::factory(['postal_code' => '1234'])->count(2))
            ->create();

        $response = $this->get('/restaurants/' . $restaurant->id);

        $restaurant->average_rating = round($restaurant->ratings->avg('score'), 2);
        $restaurant->number_of_ratings = $restaurant->ratings->count();
        $restaurant->price_delivery = round($restaurant->deliveryZones->avg('delivery_price'), 2);
        $restaurant->min_order_price = round($restaurant->deliveryZones->avg('min_order_price'), 2);
        $restaurant->min_delivery_time = $restaurant->deliveryZones->min('delivery_time');
        $restaurant->max_delivery_time = $restaurant->deliveryZones->max('delivery_time');

        $restaurant->load('categories', 'productCategories', 'productCategories.products', 'deliveryZones', 'schedules');

        $response->assertStatus(200)
            ->assertViewIs('restaurants.restaurant-page')
            ->assertViewHas('restaurant', $restaurant);
    }
}
