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
        $order = Order::factory(['status' => 'CREATED'])->create();

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

    /**
     * Assert delivery time view
     *
     * @return void
     */
    public function testOrderDeliveryTimePage()
    {
        $order = Order::factory(['status' => 'ADDRESSED'])->create();

        $response = $this->get('/order/' . $order->id . '/delivery-time');

        $response->assertStatus(200)
            ->assertViewIs('order.delivery-time')
            ->assertViewHas('order', $order);
    }

    /**
     * Assert delivery time view fail
     *
     * @return void
     */
    public function testOrderDeliveryTimePageFail()
    {
        $order = Order::factory(['status' => 'COMPLETED'])->create();

        $response = $this->get('/order/' . $order->id . '/delivery-time');

        $response->assertStatus(302)
            ->assertRedirect('/');
    }

    /**
     * Assert payment view
     *
     * @return void
     */
    public function testOrderPaymentPage()
    {
        $order = Order::factory(['status' => 'TIMED'])->create();

        $response = $this->get('/order/' . $order->id . '/payment');

        $response->assertStatus(200)
            ->assertViewIs('order.payment')
            ->assertViewHas('order', $order->load('restaurant', 'orderItems', 'address'));
    }

    /**
     * Assert payment view fail
     *
     * @return void
     */
    public function testOrderPaymentPageFail()
    {
        $order = Order::factory(['status' => 'COMPLETED'])->create();

        $response = $this->get('/order/' . $order->id . '/payment');

        $response->assertStatus(302)
            ->assertRedirect('/');
    }
}
