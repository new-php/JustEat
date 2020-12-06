<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Order;
use App\Models\User;
use App\Models\Address;
use App\Models\Restaurant;
use App\Models\OrderItem;

class OrderModelTest extends TestCase
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
        $order = Order::factory(['user_id' => $user->id])->create();

        $this->assertInstanceOf(User::class, $order->user);

        $this->assertEquals(1, $order->withCount('user')->first()->user_count);
    }

    /**
     * Address relationship
     *
     * @return void
     */
    public function testAddressRelationship()
    {
        $address = Address::factory()->create();
        $order = Order::factory(['address_id' => $address->id])->create();

        $this->assertInstanceOf(Address::class, $order->address);

        $this->assertEquals(1, $order->address->count());
    }

    /**
     * Restaurant relationship
     *
     * @return void
     */
    public function testRestaurantRelationship()
    {
        $restaurant = Restaurant::factory()->create();
        $order = Order::factory(['restaurant_id' => $restaurant->id])->create();

        $this->assertInstanceOf(Restaurant::class, $order->restaurant);

        $this->assertEquals(1, $order->restaurant->count());
    }

    /**
     * Rider relationship
     *
     * @return void
     */
    public function testRiderRelationship()
    {
        $rider = User::factory()->create();
        $order = Order::factory(['rider_id' => $rider->id])->create();

        $this->assertInstanceOf(User::class, $order->rider);

        $this->assertEquals(1, $order->withCount('rider')->first()->rider_count);
    }

    /**
     * Orders relationship
     *
     * @return void
     */
    public function testOrderItemsRelationship()
    {
        $order = Order::factory()->create();
        $order_item = OrderItem::factory(['order_id' => $order->id])->create();

        $this->assertTrue($order->orderItems->contains($order_item));

        $this->assertEquals(1, $order->orderItems->count());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $order->orderItems);
    }
}
