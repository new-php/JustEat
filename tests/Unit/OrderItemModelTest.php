<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;

class OrderItemModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Order Relationship
     *
     * @return void
     */
    public function testOrderRelationship()
    {
        $order = Order::factory()->create();
        $order_item = OrderItem::factory(['order_id' => $order->id])->create();

        $this->assertEquals(1, $order_item->order->count());

        $this->assertInstanceOf(Order::class, $order_item->order);
    }

    /**
     * Product Relationship
     *
     * @return void
     */
    public function testProductRelationship()
    {
        $product = Product::factory()->create();
        $order_item = OrderItem::factory(['product_id' => $product->id])->create();

        $this->assertEquals(1, $order_item->product->count());

        $this->assertInstanceOf(Product::class, $order_item->product);
    }
}
