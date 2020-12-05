<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Order;

class OrderPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Assert delivery address view
     *
     * @return void
     */
    public function testOrderDeliveryAddressPage()
    {
        $order = Order::factory()->create();

        $response = $this->get('/order/' . $order->id . '/delivery-address');

        $response->assertStatus(200)
            ->assertViewIs('order.delivery-address')
            ->assertViewHas('order', $order);
    }

    /**
     * Assert delivery address view fail
     *
     * @return void
     */
    public function testOrderDeliveryAddressPageFail()
    {
        $order = Order::factory(['status' => 'COMPLETED'])->create();

        $response = $this->get('/order/' . $order->id . '/delivery-address');

        $response->assertStatus(302)
            ->assertRedirect('/');
    }
}
