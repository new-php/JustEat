<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;
use App\Models\User;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Restaurant;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Get all orders from a user
     *
     * @return void
     */
    public function testGetOrders()
    {
        $user = User::factory()->create();

        $restaurant = Restaurant::factory()->create();

        $address = Address::factory(['user_id' => $user->id])->create();

        $order = Order::factory(['user_id' => $user->id, 'restaurant_id' => $restaurant->id, 'address_id' => $address->id])
            ->has(OrderItem::factory()->count(2))
            ->create();
            //dd($order);
        $response = $this->actingAs($user, 'api')->getJson('api/v1/orders');

        $response->assertStatus(200)
            ->assertJsonStructure(
                [
                    'data' => [
                        [
                            'id',
                            'user_id',
                            'address_id',
                            'restaurant_id',
                            'details',
                            'shipping',
                            'total',
                            'order_status',
                            'status',
                            'rider_id',
                            'delivery_mode',
                            'delivery_time',
                            'payed',
                            'created_at',
                            'updated_at',
                            'restaurant' => [
                                'id',
                                'user_id',
                                'name',
                                'email',
                                'photo',
                                'logo',
                                'phone',
                                'address',
                                'postal_code',
                                'city',
                                'state',
                                'country',
                                'cif',
                                'created_at',
                                'updated_at',
                            ],
                            'order_items' => [
                                [
                                    'id',
                                    'order_id',
                                    'product_id',
                                    'price',
                                    'quantity',
                                    'created_at',
                                    'updated_at',
                                ],
                                [
                                    'id',
                                    'order_id',
                                    'product_id',
                                    'price',
                                    'quantity',
                                    'created_at',
                                    'updated_at',
                                ],
                            ],
                        ],
                    ],
                ],
            )
            ->assertExactJson(
                [
                    'data' => [
                        [
                            'id' => $order->id,
                            'user_id' => $order->user_id,
                            'address_id' => $order->address_id,
                            'restaurant_id' => $order->restaurant_id,
                            'details' => $order->details,
                            'shipping' => $order->shipping,
                            'total' => $order->total,
                            'order_status' => $order->order_status,
                            'status' => $order->status,
                            'rider_id' => $order->rider_id,
                            'delivery_mode' => $order->delivery_mode,
                            'delivery_time' => $order->delivery_time,
                            'payed' => $order->payed,
                            'created_at' => $order->created_at,
                            'updated_at' => $order->updated_at,
                            'restaurant' => [
                                'id' => $order->restaurant->id,
                                'user_id' => $order->restaurant->user_id,
                                'name' => $order->restaurant->name,
                                'email' => $order->restaurant->email,
                                'photo' => $order->restaurant->photo,
                                'logo' => $order->restaurant->logo,
                                'phone' => $order->restaurant->phone,
                                'address' => $order->restaurant->address,
                                'postal_code' => $order->restaurant->postal_code,
                                'city' => $order->restaurant->city,
                                'state' => $order->restaurant->state,
                                'country' => $order->restaurant->country,
                                'cif' => $order->restaurant->cif,
                                'created_at' => $order->restaurant->created_at,
                                'updated_at' => $order->restaurant->updated_at,
                            ],
                            'order_items' => [
                                [
                                    'id' => $order->orderItems[0]->id,
                                    'order_id' => $order->orderItems[0]->order_id,
                                    'product_id' => $order->orderItems[0]->product_id,
                                    'price' => $order->orderItems[0]->price,
                                    'quantity' => $order->orderItems[0]->quantity,
                                    'created_at' => $order->orderItems[0]->created_at,
                                    'updated_at' => $order->orderItems[0]->updated_at,
                                ],
                                [
                                    'id' => $order->orderItems[1]->id,
                                    'order_id' => $order->orderItems[1]->order_id,
                                    'product_id' => $order->orderItems[1]->product_id,
                                    'price' => $order->orderItems[1]->price,
                                    'quantity' => $order->orderItems[1]->quantity,
                                    'created_at' => $order->orderItems[1]->created_at,
                                    'updated_at' => $order->orderItems[1]->updated_at,
                                ],
                            ],
                        ],
                    ],
                ],
            );
    }

    /**
     * Get all orders for unauthenticated user
     *
     * @return void
     */
    public function testGetOrdersUnauthenticated()
    {
        $user = User::factory()->create();

        $restaurant = Restaurant::factory()->create();

        $address = Address::factory(['user_id' => $user->id])->create();

        $order = Order::factory(['user_id' => $user->id, 'restaurant_id' => $restaurant->id, 'address_id' => $address->id])
            ->has(OrderItem::factory()->count(2))
            ->create();

        $response = $this->getJson('api/v1/orders');

        $response->assertStatus(401)
            ->assertJsonStructure(
                [
                    'message',
                ],
            )
            ->assertExactJson(
                [
                    'message' => 'Unauthenticated.',
                ],
            );
    }

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
                    'quantity' => 3
                ),
                array(
                    'id' => $product2->id,
                    'quantity' => 5
                )
            ),
            'shipping' => 3.44,
            'delivery_mode' => 'cool_delivery'
        );

        $response = $this->post('/api/v1/order/', $data, [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(201);
        $this->assertEquals("CREATED", json_decode($response->content())->data->status);
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

        $order = Order::factory()->create([
            'user_id' => $user->id,
            'status' => 'SELECTED'
        ]);
        $address = Address::factory()->create();

        $response = $this->put('/api/v1/order/' . $order->id . '/address', [
            'name' => 'test',
            'phone' => 'test',
            'address_line_1' => 'test',
            'address_line_2' => 'test',
            'details' => 'test',
            'city' => 'test',
            'post_code' => 'test',
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(200);
        $this->assertEquals("ADDRESSED", json_decode($response->content())->data->status);
    }

    /**
     * Test adding address to an order that is not yours, should fail
     *
     * @return void
     */
    public function testAddAddressOtherUsersOrder()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $order = Order::factory()->create([
            'user_id' => $user->id + 1,
            'status' => 'SELECTED'
        ]);
        $address = Address::factory()->create();

        $response = $this->put('/api/v1/order/' . $order->id . '/address', [
            'name' => 'test',
            'phone' => 'test',
            'address_line_1' => 'test',
            'address_line_2' => 'test',
            'details' => 'test',
            'city' => 'test',
            'post_code' => 'test',
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(403);
    }

    /**
     * Test adding address to completed order
     *
     * @return void
     */
    public function testAddAddressCompletedOrder()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $order = Order::factory()->create([
            'user_id' => $user->id,
            'status' => 'COMPLETED'
        ]);
        $address = Address::factory()->create();

        $response = $this->put('/api/v1/order/' . $order->id . '/address', [
            'name' => 'test',
            'phone' => 'test',
            'address_line_1' => 'test',
            'address_line_2' => 'test',
            'details' => 'test',
            'city' => 'test',
            'post_code' => 'test',
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(403);
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

        $order = Order::factory()->create([
            'user_id' => $user->id,
            'status' => 'SELECTED'
        ]);

        $response = $this->put('/api/v1/order/' . $order->id . '/delivery', [
            'delivery_time' => 'mock_delivery',
            'description' => 'not_null_details',
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(200);
        $this->assertEquals("TIMED", json_decode($response->content())->data->status);
        $this->assertEquals("mock_delivery", json_decode($response->content())->data->delivery_time);
        $this->assertEquals("not_null_details", json_decode($response->content())->data->details);
    }

    /**
     * Test adding delivery method to an order that is not yours
     *
     * @return void
     */
    public function testUnauthorizedDelivery()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $order = Order::factory()->create([
            'user_id' => $user->id + 1,
            'status' => 'SELECTED'
        ]);

        $response = $this->put('/api/v1/order/' . $order->id . '/delivery', [
            'delivery_time' => 'mock_delivery',
            'description' => 'not_null_details',
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(403);
    }

    /**
     * Test adding delivery method when order is completed, should fail
     *
     * @return void
     */
    public function testDeliveryCompletedOrder()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $order = Order::factory()->create([
            'user_id' => $user->id,
            'status' => 'COMPLETED'
        ]);

        $response = $this->put('/api/v1/order/' . $order->id . '/delivery', [
            'delivery_time' => 'mock_delivery',
            'description' => 'not_null_details',
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(403);
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

        $order = Order::factory()->create([
            'user_id' => $user->id,
            'status' => 'SELECTED'
        ]);

        $response = $this->put('/api/v1/order/' . $order->id . '/delivery', [
            'delivery_time' => 'mock_delivery',
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(200);
        $this->assertEquals("TIMED", json_decode($response->content())->data->status);
        $this->assertEquals("mock_delivery", json_decode($response->content())->data->delivery_time);
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

        $order = Order::factory()->create([
            'user_id' => $user->id,
            'status' => 'SELECTED'
        ]);

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

        $order = Order::factory()->create([
            'status' => 'SELECTED',
            'user_id' => $user->id
        ]);

        $response = $this->put('/api/v1/order/' . $order->id . '/pay', [
            'payed' => true,
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(200);
        $this->assertEquals("COMPLETED", json_decode($response->content())->status);
    }

    /**
     * Test paying method when order already paid, should not work
     *
     * @return void
     */
    public function testPayAlreadyPaid()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $order = Order::factory()->create([
            'status' => 'COMPLETED',
            'user_id' => $user->id
        ]);

        $response = $this->put('/api/v1/order/' . $order->id . '/pay', [
            'payed' => true,
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(403);
    }

    /**
     * Test paying method when paying another's users order, should fail
     *
     * @return void
     */
    public function testPayAnotherUsersOrder()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $order = Order::factory()->create([
            'status' => 'SELECTED',
            'user_id' => $user->id + 1
        ]);

        $response = $this->put('/api/v1/order/' . $order->id . '/pay', [
            'payed' => true,
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(403);
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
