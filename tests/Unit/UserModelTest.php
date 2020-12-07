<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Address;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Restaurant;
use App\Models\PaymentMethod;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Addresses relationship
     *
     * @return void
     */
    public function testAddressesRelationship()
    {
        $user = User::factory()->create();
        $address = Address::factory(['user_id' => $user->id])->create();

        $this->assertTrue($user->addresses->contains($address));

        $this->assertEquals(1, $user->addresses->count());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->addresses);
    }

    /**
     * Orders relationship
     *
     * @return void
     */
    public function testOrdersRelationship()
    {
        $user = User::factory()->create();
        $order = Order::factory(['user_id' => $user->id])->create();

        $this->assertTrue($user->orders->contains($order));

        $this->assertEquals(1, $user->orders->count());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->orders);
    }

    /**
     * RiderOrders relationship
     *
     * @return void
     */
    public function testRiderOrdersRelationship()
    {
        $user = User::factory()->create();
        $order = Order::factory(['rider_id' => $user->id])->create();

        $this->assertTrue($user->riderOrders->contains($order));

        $this->assertEquals(1, $user->riderOrders->count());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->riderOrders);
    }

    /**
     * Ratings relationship
     *
     * @return void
     */
    public function testRatingsRelationship()
    {
        $user = User::factory()->create();
        $rating = Rating::factory(['user_id' => $user->id])->create();

        $this->assertTrue($user->ratings->contains($rating));

        $this->assertEquals(1, $user->ratings->count());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->ratings);
    }

    /**
     * Restaurants relationship
     *
     * @return void
     */
    public function testRestaurantsRelationship()
    {
        $user = User::factory()->create();
        $restaurant = Restaurant::factory(['user_id' => $user->id])->create();

        $this->assertTrue($user->restaurants->contains($restaurant));

        $this->assertEquals(1, $user->restaurants->count());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->restaurants);
    }

    /**
     * PaymentMethods relationship
     *
     * @return void
     */
    public function testPaymentMethodsRelationship()
    {
        $user = User::factory()->create();
        $payment_method = PaymentMethod::factory(['user_id' => $user->id])->create();

        $this->assertTrue($user->paymentMethods->contains($payment_method));

        $this->assertEquals(1, $user->paymentMethods->count());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->paymentMethods);
    }
}
