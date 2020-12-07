<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Schedule;
use App\Models\Restaurant;

class ScheduleModelTest extends TestCase
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
        $schedule = Schedule::factory(['restaurant_id' => $restaurant->id])->create();

        $this->assertInstanceOf(Restaurant::class, $schedule->restaurant);

        $this->assertEquals(1, $schedule->restaurant->count());
    }
}
