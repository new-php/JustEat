<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Schedule;
use App\Models\DeliveryZone;
use App\Models\Rating;
use App\Models\ProductCategory;

class RestaurantModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * User relationship
     *
     * @return void
     */
    public function testUserRelationship()
    {
        $user = User::factory()->create();
        $restaurant = Restaurant::factory(['user_id' => $user->id])->create();

        $this->assertInstanceOf(User::class, $restaurant->user);

        $this->assertEquals(1, $restaurant->user->count());
    }

    /**
     * Categories relationship
     *
     * @return void
     */
    public function testCategoriesRelationship()
    {
        $category = Category::factory()->create();
        $restaurant = Restaurant::factory()->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $restaurant->categories);
    }

    /**
     * Products relationship
     *
     * @return void
     */
    public function testProductsRelationship()
    {
        $restaurant = Restaurant::factory()->create();
        $product = Product::factory(['restaurant_id' => $restaurant->id])->create();

        $this->assertTrue($restaurant->products->contains($product));

        $this->assertEquals(1, $restaurant->products->count());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $restaurant->products);
    }

    /**
     * Orders relationship
     *
     * @return void
     */
    public function testOrdersRelationship()
    {
        $restaurant = Restaurant::factory()->create();
        $order = Order::factory(['restaurant_id' => $restaurant->id])->create();

        $this->assertTrue($restaurant->orders->contains($order));

        $this->assertEquals(1, $restaurant->orders->count());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $restaurant->orders);
    }

    /**
     * Schedules relationship
     *
     * @return void
     */
    public function testSchedulesRelationship()
    {
        $restaurant = Restaurant::factory()->create();
        $schedule = Schedule::factory(['restaurant_id' => $restaurant->id])->create();

        $this->assertTrue($restaurant->schedules->contains($schedule));

        $this->assertEquals(1, $restaurant->schedules->count());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $restaurant->schedules);
    }

    /**
     * Delivery Zones relationship
     *
     * @return void
     */
    public function testDeliveryZonesRelationship()
    {
        $restaurant = Restaurant::factory()->create();
        $delivery_zone = DeliveryZone::factory(['restaurant_id' => $restaurant->id])->create();

        $this->assertTrue($restaurant->deliveryZones->contains($delivery_zone));

        $this->assertEquals(1, $restaurant->deliveryZones->count());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $restaurant->deliveryZones);
    }

    /**
     * Ratings relationship
     *
     * @return void
     */
    public function testRatingsRelationship()
    {
        $restaurant = Restaurant::factory()->create();
        $rating = Rating::factory(['restaurant_id' => $restaurant->id])->create();

        $this->assertTrue($restaurant->ratings->contains($rating));

        $this->assertEquals(1, $restaurant->ratings->count());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $restaurant->ratings);
    }

    /**
     * ProductCategories relationship
     *
     * @return void
     */
    public function testProductCategoriesRelationship()
    {
        $restaurant = Restaurant::factory()->create();
        $product_category = ProductCategory::factory(['restaurant_id' => $restaurant->id])->create();

        $this->assertTrue($restaurant->productCategories->contains($product_category));

        $this->assertEquals(1, $restaurant->productCategories->count());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $restaurant->productCategories);
    }
}
