<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;
use App\Models\User;
use App\Models\Address;
use App\Models\PaymentMethod;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Get Existing User while being auth'd
     *
     * @return void
     */
    public function testGetUser()
    {
        $user = User::factory()
            ->has(Address::factory()->count(1))
            ->has(PaymentMethod::factory()->count(1))
            ->create();

        $response = $this->actingAs($user, 'api')->getJson('/api/v1/user');
        $response->assertStatus(200)
            ->assertJsonStructure(
                [
                    'data' => [
                        'id',
                        'name',
                        'email',
                        'phone',
                        'sms_offers',
                        'email_offers',
                        'email_verified_at',
                        'updated_at',
                        'created_at',
                        'addresses' => [
                            [
                                'id',
                                'user_id',
                                'name',
                                'address_name',
                                'phone',
                                'address_line_1',
                                'address_line_2',
                                'observations',
                                'city',
                                'postal_code',
                                'created_at',
                                'updated_at',
                            ],
                        ],
                        'payment_methods' => [
                            [
                                'id',
                                'user_id',
                                'created_at',
                                'updated_at',
                            ],
                        ],
                    ],
                ],
            )
            ->assertExactJson(
                [
                    'data' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'phone' => $user->phone,
                        'sms_offers' => $user->sms_offers,
                        'email_offers' => $user->email_offers,
                        'email_verified_at' => $user->email_verified_at,
                        'updated_at' => $user->updated_at,
                        'created_at' => $user->created_at,
                        'addresses' => [
                            [
                                'id' => $user->addresses()->first()->id,
                                'user_id' => $user->addresses()->first()->user_id,
                                'name' => $user->addresses()->first()->name,
                                'address_name' => $user->addresses()->first()->address_name,
                                'phone' => $user->addresses()->first()->phone,
                                'address_line_1' => $user->addresses()->first()->address_line_1,
                                'address_line_2' => $user->addresses()->first()->address_line_2,
                                'observations' => $user->addresses()->first()->observations,
                                'city' => $user->addresses()->first()->city,
                                'postal_code' => $user->addresses()->first()->postal_code,
                                'created_at' => $user->addresses()->first()->created_at,
                                'updated_at' => $user->addresses()->first()->updated_at,
                            ],
                        ],
                        'payment_methods' => [
                            [
                                'id' => $user->paymentMethods()->first()->id,
                                'user_id' => $user->paymentMethods()->first()->user_id,
                                'created_at' => $user->paymentMethods()->first()->created_at,
                                'updated_at' => $user->paymentMethods()->first()->updated_at,
                            ],
                        ],
                    ],
                ],
            );
    }

    /**
     * Get current user without logging in, expecting redirection
     *
     * @return void
     */
    public function testGetUserWithNoUserLogged()
    {
        $response = $this->getJson('/api/v1/user');

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
     * Update user name, email and phone
     *
     * @return void
     */
    public function testUpdateUser()
    {
        $user = User::factory()
            ->has(Address::factory()->count(1))
            ->has(PaymentMethod::factory()->count(1))
            ->create();

        $response = $this->actingAs($user, 'api')->putJson('/api/v1/user/' . $user->id,
            [
                'name' => 'test',
                'email' => 'test@test.com',
                'phone' => '1234',
                'sms_offers' => false,
                'email_offers' => false,
            ],
        );

        $response->assertStatus(200)
            ->assertJsonStructure(
                [
                    'data' => [
                        'id',
                        'name',
                        'email',
                        'phone',
                        'sms_offers',
                        'email_offers',
                        'email_verified_at',
                        'updated_at',
                        'created_at',
                        'addresses' => [
                            [
                                'id',
                                'user_id',
                                'name',
                                'address_name',
                                'phone',
                                'address_line_1',
                                'address_line_2',
                                'observations',
                                'city',
                                'postal_code',
                                'created_at',
                                'updated_at',
                            ],
                        ],
                        'payment_methods' => [
                            [
                                'id',
                                'user_id',
                                'created_at',
                                'updated_at',
                            ],
                        ],
                    ],
                ],
            )
            ->assertExactJson(
                [
                    'data' => [
                        'id' => $user->id,
                        'name' => 'test',
                        'email' => 'test@test.com',
                        'phone' => '1234',
                        'sms_offers' => 0,
                        'email_offers' => 0,
                        'email_verified_at' => $user->email_verified_at,
                        'updated_at' => $user->updated_at,
                        'created_at' => $user->created_at,
                        'addresses' => [
                            [
                                'id' => $user->addresses()->first()->id,
                                'user_id' => $user->addresses()->first()->user_id,
                                'name' => $user->addresses()->first()->name,
                                'address_name' => $user->addresses()->first()->address_name,
                                'phone' => $user->addresses()->first()->phone,
                                'address_line_1' => $user->addresses()->first()->address_line_1,
                                'address_line_2' => $user->addresses()->first()->address_line_2,
                                'observations' => $user->addresses()->first()->observations,
                                'city' => $user->addresses()->first()->city,
                                'postal_code' => $user->addresses()->first()->postal_code,
                                'created_at' => $user->addresses()->first()->created_at,
                                'updated_at' => $user->addresses()->first()->updated_at,
                            ],
                        ],
                        'payment_methods' => [
                            [
                                'id' => $user->paymentMethods()->first()->id,
                                'user_id' => $user->paymentMethods()->first()->user_id,
                                'created_at' => $user->paymentMethods()->first()->created_at,
                                'updated_at' => $user->paymentMethods()->first()->updated_at,
                            ],
                        ],
                    ],
                ],
            );
    }

    /**
     * Update user without being authenticated
     *
     * @return void
     */
    public function testUpdateUserNoAuth()
    {
        $user = User::factory()
            ->has(Address::factory()->count(1))
            ->has(PaymentMethod::factory()->count(1))
            ->create();

        $response = $this->putJson('/api/v1/user/' . $user->id,
            [
                'name' => 'test',
                'email' => 'test@test.com',
                'phone' => '1234',
                'sms_offers' => false,
                'email_offers' => false,
            ],
        );

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
     * Update user invalid user id
     *
     * @return void
     */
    public function testUpdateUserInvalidUserId()
    {
        $user = User::factory()
            ->has(Address::factory()->count(1))
            ->has(PaymentMethod::factory()->count(1))
            ->create();

        $response = $this->actingAs($user, 'api')->putJson('/api/v1/user/0',
            [
                'name' => 'test',
                'email' => 'test@test.com',
                'phone' => '1234',
                'sms_offers' => false,
                'email_offers' => false,
            ],
        );

        $response->assertStatus(403)
            ->assertJsonStructure(
                [
                    'message',
                ],
            )
            ->assertExactJson(
                [
                    'message' => 'Not authorized',
                ],
            );
    }

    /**
     * Update user invalid parameters
     *
     * @return void
     */
    public function testUpdateUserInvalidParameters()
    {
        $user = User::factory()
            ->has(Address::factory()->count(1))
            ->has(PaymentMethod::factory()->count(1))
            ->create();

        // String with more than 255 characters
        $param_invalid = '';
        for ($i = 0; $i < 256; $i++) {
            $param_invalid = $param_invalid . 'a';
        }

        $response = $this->actingAs($user, 'api')->putJson('/api/v1/user/' . $user->id,
            [
                'name' => $param_invalid,
                'email' => $param_invalid,
                'phone' => $param_invalid,
                'sms_offers' => "string",
                'email_offers' => "string",
            ],
        );

        $response->assertStatus(422)
            ->assertJsonStructure(
                [
                    'errors' =>
                        [
                            'email' => [],
                            'name' => [],
                            'phone' => [],
                            'sms_offers' => [],
                            'email_offers' => [],
                        ],
                    'message',
                ],
            )
            ->assertExactJson(
                [
                    'errors' =>
                        [
                            'email' => [
                                'The email must be a valid email address.',
                                'The email may not be greater than 255 characters.',
                            ],
                            'name' => [
                                'The name may not be greater than 255 characters.',
                            ],
                            'phone' => [
                                'The phone may not be greater than 255 characters.',
                            ],
                            'sms_offers' => [
                                'The sms offers field must be true or false.',
                            ],
                            'email_offers' => [
                                'The email offers field must be true or false.',
                            ],
                        ],
                    'message' => 'The given data was invalid.',
                ],
            );
    }
}
