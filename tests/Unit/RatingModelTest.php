<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Rating;
use App\Models\User;
use App\Models\Restaurant;

class RatingModelTest extends TestCase
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
        $rating = Rating::factory(['user_id' => $user->id])->create();

        $this->assertInstanceOf(User::class, $rating->user);

        $this->assertEquals(1, $rating->withCount('user')->first()->user_count);
    }

    /**
     * Restaurant relationship
     *
     * @return void
     */
    public function testRestaurantRelationship()
    {
        $restaurant = Restaurant::factory()->create();
        $rating = Rating::factory(['restaurant_id' => $restaurant->id])->create();

        $this->assertInstanceOf(Restaurant::class, $rating->restaurant);

        $this->assertEquals(1, $rating->restaurant->count());
    }
}
