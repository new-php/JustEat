<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Category;
use App\Models\Restaurant;

class CategoryModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Restaurants relationship
     *
     * @return void
     */
    public function testRestaurantsRelationship()
    {
        $category = Category::factory()->create();
        $restaurant = Restaurant::factory()->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $category->restaurants);

        $category->delete();
    }
}
