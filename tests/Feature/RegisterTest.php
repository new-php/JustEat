<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use WithFaker;
    /**
     * Register fail required validation
     *
     * @return void
     */
    public function testRegisterFailRequired()
    {
        $response = $this->post('/api/v1/register',
            [
                'email' => '',
                'password' => '',
                'password_confirmation' => '',
            ],
            [
                'Accept' => 'application/json',
            ]
        );

        $response->assertStatus(422)
            ->assertExactJson(
                [
                    "message" => "The given data was invalid.",
                    "errors" => [
                        "email" => [
                            "The email field is required.",
                        ],
                        "password" => [
                            "The password field is required.",
                        ]
                    ]
                ]
            );
    }

    /**
     * Register fail email validation
     *
     * @return void
     */
    public function testRegisterFailEmail()
    {
        $response = $this->post('/api/v1/register',
            [
                'email' => 'hola',
                'password' => '12345678',
                'password_confirmation' => '12345678',
            ],
            [
                'Accept' => 'application/json',
            ]
        );

        $response->assertStatus(422)
            ->assertExactJson(
                [
                    "message" => "The given data was invalid.",
                    "errors" => [
                        "email" => [
                            "The email must be a valid email address.",
                        ]
                    ]
                ]
            );
    }

    /**
     * Register fail email unique validation
     *
     * @return void
     */
    public function testRegisterFailEmailUnique()
    {
        $response = $this->post('/api/v1/register',
            [
                'email' => 'admin@justeat.com',
                'password' => '12345678',
                'password_confirmation' => '12345678',
            ],
            [
                'Accept' => 'application/json',
            ]
        );

        $response->assertStatus(422)
            ->assertExactJson(
                [
                    "message" => "The given data was invalid.",
                    "errors" => [
                        "email" => [
                            "The email has already been taken.",
                        ]
                    ]
                ]
            );
    }

    /**
     * Register fail password min validation
     *
     * @return void
     */
    public function testRegisterFailPasswordMin()
    {
        $response = $this->post('/api/v1/register',
            [
                'email' => $this->faker->email,
                'password' => '1234',
                'password_confirmation' => '1234',
            ],
            [
                'Accept' => 'application/json',
            ]
        );

        $response->assertStatus(422)
            ->assertExactJson(
                [
                    "message" => "The given data was invalid.",
                    "errors" => [
                        "password" => [
                            "The password must be at least 8 characters.",
                        ]
                    ]
                ]
            );
    }

    /**
     * Register fail password confirmation validation
     *
     * @return void
     */
    public function testRegisterFailPasswordConfirmation()
    {
        $response = $this->post('/api/v1/register',
            [
                'email' => $this->faker->email,
                'password' => '12345678',
                'password_confirmation' => '1234',
            ],
            [
                'Accept' => 'application/json',
            ]
        );

        $response->assertStatus(422)
            ->assertExactJson(
                [
                    "message" => "The given data was invalid.",
                    "errors" => [
                        "password" => [
                            "The password confirmation does not match.",
                        ]
                    ]
                ]
            );
    }

    /**
     * Register success
     *
     * @return void
     */
    public function testRegister()
    {
        $email = $this->faker->email;
        $response = $this->post('/api/v1/register',
            [
                'email' => $email,
                'password' => '12345678',
                'password_confirmation' => '12345678',
            ],
            [
                'Accept' => 'application/json'
            ]
        );

        $response->assertStatus(201)
            ->assertJsonStructure(
                [
                    'data' => [
                        'id',
                        'email',
                        'created_at',
                        'updated_at',
                    ],
                    'access_token',
                ]
            );
        $this->assertDatabaseHas('users',
            [
                'email' => $email,
            ]
        );
    }
}
