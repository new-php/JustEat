<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;
use App\Models\User;
use App\Models\Address;
use App\Models\Order;
use App\Models\Product;
use App\Models\Restaurant;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Store a new order correctly
     *
     * @return void
     */
    public function testStoreOrderOk()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $restaurant = Restaurant::factory()->create();
        $product1 = Product::factory()->create([
            'id' => 100,
            'price' => 12.33,
        ]);
        $product2 = Product::factory()->create([
            'id' => 200,
            'price' => 1.50,
        ]);

        $data = array(
            'restaurant_id' => $restaurant->id,
            'products' => array(
                array(
                    'id' => $product1->id,
                    'price' => $product1->price,
                    'quantity' => 3
                ),
                array(
                    'id' => $product2->id,
                    'price' => $product2->price,
                    'quantity' => 5
                )
            )
        );

        $response = $this->post('/api/v1/order/', $data, [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(201);
        $this->assertEquals("SELECTED", json_decode($response->content())->order->status);
        $this->assertEquals(2, sizeof(json_decode($response->content())->products));
    }

    /**
     * Store an order with no user fails
     * 
     * @return void
     */
    public function testStoreOrderNoAuth()
    {
        $restaurant = Restaurant::factory()->create();
        $product1 = Product::factory()->create([
            'id' => 100,
            'price' => 12.33,
        ]);
        $product2 = Product::factory()->create([
            'id' => 200,
            'price' => 1.50,
        ]);

        $data = array(
            'restaurant_id' => $restaurant->id,
            'products' => array(
                array(
                    'id' => $product1->id,
                    'price' => $product1->price,
                    'quantity' => 3
                ),
                array(
                    'id' => $product2->id,
                    'price' => $product2->price,
                    'quantity' => 5
                )
            )
        );

        $response = $this->post('/api/v1/order/', $data, [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(401);
    }

    /**
     * Storing an order with no products fails
     * 
     * @return void
     */
    public function testStoreOrderWithNoProducts()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $restaurant = Restaurant::factory()->create();

        $data = array(
            'restaurant_id' => $restaurant->id,
            'products' => array()
        );

        $response = $this->post('/api/v1/order/', $data, [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(422);
    }

    /**
     * Test adding address to existing order
     * 
     * @return void
     */
    public function testAddAddressOk()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $order = Order::factory()->create();
        $address = Address::factory()->create();
       
        $response = $this->put('/api/v1/order/' . $order->id . '/address', [
            'address_id' => $address->id,
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(200);
        $this->assertEquals("ADDRESSED", json_decode($response->content())->status);
        $this->assertEquals($address->id, json_decode($response->content())->address_id);
    }

    /**
     * Test adding address to non-existing order
     * 
     * @return void
     */
    public function testAddAddressToNonExistingOrder()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $address = Address::factory()->create();
       
        $response = $this->put('/api/v1/order/404/address', [
            'address_id' => $address->id,
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(404);
    }

    /**
     * Test adding address with no auth, should fail
     * 
     * @return void
     */
    public function testAddAddressWithNoAuth()
    {
        $order = Order::factory()->create();
        $address = Address::factory()->create();
       
        $response = $this->put('/api/v1/order/' . $order->id . '/address', [
            'address_id' => $address->id,
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(401);
    }

    /**
     * Test adding delivery method
     * 
     * @return void
     */
    public function testDeliveryOk()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $order = Order::factory()->create();
       
        $response = $this->put('/api/v1/order/' . $order->id . '/delivery', [
            'delivery_mode' => 'mock_delivery',
            'details' => 'not_null_details',
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(200);
        $this->assertEquals("TIMED", json_decode($response->content())->status);
        $this->assertEquals("mock_delivery", json_decode($response->content())->delivery_mode);
        $this->assertEquals("not_null_details", json_decode($response->content())->details);
    }

    /**
     * Test adding delivery method without details, should be ok
     * 
     * @return void
     */
    public function testDeliveryNoDetailsOk()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $order = Order::factory()->create();
       
        $response = $this->put('/api/v1/order/' . $order->id . '/delivery', [
            'delivery_mode' => 'mock_delivery',
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(200);
        $this->assertEquals("TIMED", json_decode($response->content())->status);
        $this->assertEquals("mock_delivery", json_decode($response->content())->delivery_mode);
    }

    /**
     * Test adding delivery method wrong orderId, should fail
     * 
     * @return void
     */
    public function testDeliveryWrongId()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $order = Order::factory()->create();
       
        $response = $this->put('/api/v1/order/200/delivery', [
            'delivery_mode' => 'mock_delivery',
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(404);
    }

    /**
     * Test adding delivery method without delivery_mode, should fail
     * 
     * @return void
     */
    public function testDeliveryNoModeFailk()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $order = Order::factory()->create();
       
        $response = $this->put('/api/v1/order/' . $order->id . '/delivery', [
            'details' => 'not_null_details',
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(422);
    }
    
    /**
     * Test adding delivery method with no auth, should fail
     * 
     * @return void
     */
    public function testDeliveryWithNoAuth()
    {
        $order = Order::factory()->create();
       
        $response = $this->put('/api/v1/order/' . $order->id . '/delivery', [
            'delivery_mode' => 'mock_delivery',
            'details' => 'not_null_details',
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(401);
    }   

    /**
     * Test paying method
     * 
     * @return void
     */
    public function testPayOk()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $order = Order::factory()->create();
       
        $response = $this->put('/api/v1/order/' . $order->id . '/pay', [], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(200);
        $this->assertEquals("PAID - PROCESSING FOR DELIVERY", json_decode($response->content())->status);
    }

    /**
     * Test paying method wrong id, should fail
     * 
     * @return void
     */
    public function testPayWrongId()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $order = Order::factory()->create();
       
        $response = $this->put('/api/v1/order/300/pay', [], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(404);
    }

    /**
     * Test paying method with no auth, should fail
     * 
     * @return void
     */
    public function testPayWithNoAuth()
    {
        $order = Order::factory()->create();
       
        $response = $this->put('/api/v1/order/' . $order->id . '/pay', [], [
            'Accept' => 'application/json',
        ]);
        
        $response->assertStatus(401);
    }
}