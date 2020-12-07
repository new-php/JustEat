<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\DeliveryZone;
use App\Models\Restaurant;

class DeliveryZoneModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Restaurant relationship
     *
     * @return void
     */
    public function testRestaurantRelationship()
    {
        $restaurant = Restaurant::factory()->create();
        $delivery_zone = DeliveryZone::factory(['restaurant_id' => $restaurant->id])->create();

        $this->assertEquals(1, $delivery_zone->restaurant->count());

        $this->assertInstanceOf(Restaurant::class, $delivery_zone->restaurant);
    }
}
