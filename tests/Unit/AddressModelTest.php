<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Address;
use App\Models\User;
use App\Models\Order;

class AddressModelTest extends TestCase
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
        $address = Address::factory(['user_id' => $user->id])->create();

        $this->assertInstanceOf(User::class, $address->user);

        $this->assertEquals(1, $address->user->count());
    }

    /**
     * Orders relationship
     *
     * @return void
     */
    public function testOrdersRelationship()
    {
        $address = Address::factory()->create();
        $order = Order::factory(['address_id' => $address->id])->create();

        $this->assertTrue($address->orders->contains($order));

        $this->assertEquals(1, $address->orders->count());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $address->orders);
    }
}
