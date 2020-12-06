<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Restaurant;

class ProductCategoryModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Products relationship
     *
     * @return void
     */
    public function testProductsRelationship()
    {
        $product_category = ProductCategory::factory()->create();
        $products = Product::factory()->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $product_category->products);
    }

    /**
     * Restaurant relationship
     *
     * @return void
     */
    public function testRestaurantRelationship()
    {
        $restaurant = Restaurant::factory()->create();
        $product_category = ProductCategory::factory(['restaurant_id' => $restaurant->id])->create();

        $this->assertInstanceOf(Restaurant::class, $product_category->restaurant);

        $this->assertEquals(1, $product_category->restaurant->count());
    }
}
