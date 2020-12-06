<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Restaurant;
use App\Models\OrderItem;

class ProductModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Product Categories relationship
     *
     * @return void
     */
    public function testProductCategoriesRelationship()
    {
        $product = Product::factory()->create();
        $product_category = ProductCategory::factory()->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $product->productCategories);
    }

    /**
     * Restaurant relationship
     *
     * @return void
     */
    public function testRestaurantRelationship()
    {
        $restaurant = Restaurant::factory()->create();
        $product = Product::factory(['restaurant_id' => $restaurant->id])->create();

        $this->assertInstanceOf(Restaurant::class, $product->restaurant);

        $this->assertEquals(1, $product->restaurant->count());
    }

    /**
     * Order Items relationship
     *
     * @return void
     */
    public function testOrderItemsRelationship()
    {
        $product = Product::factory()->create();
        $order_item = OrderItem::factory(['product_id' => $product->id])->create();

        $this->assertTrue($product->orderItems->contains($order_item));

        $this->assertEquals(1, $product->orderItems->count());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $product->orderItems);
    }
}
