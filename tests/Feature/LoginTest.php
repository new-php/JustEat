<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    /**
     * Login successful
     *
     * @return void
     */
    public function testLogin()
    {
        $user = User::factory()->create();

        $response = $this->post('/api/v1/oauth/token',
            [
                'username' => $user->email,
                'password' => 'password',
                'grant_type' => 'password',
                'client_id' => 2,
                'client_secret' => 'WzcCcKmUuZGpa8fq46MCZl6TDRKLoGmkEEimjaAq',
            ],
            [
                'Accept' => 'application/json',
            ]);

        $response->assertStatus(200)
            ->assertJsonStructure(
                [
                    'token_type',
                    'expires_in',
                    'access_token',
                    'refresh_token',
                ]
           );
    }

    /**
     * Login fail
     *
     * @return void
     */
    public function testLoginFail()
    {
        $user = User::factory()->create();

        $response = $this->post('/api/v1/oauth/token',
            [
                'username' => $user->email,
                'password' => 'fail',
                'grant_type' => 'password',
                'client_id' => 2,
                'client_secret' => 'WzcCcKmUuZGpa8fq46MCZl6TDRKLoGmkEEimjaAq',
            ],
            [
                'Accept' => 'application/json',
            ]);

        $response->assertStatus(400)
            ->assertJsonStructure(
                [
                    'error',
                    'error_description',
                    'hint',
                    'message',
                ]
           );
    }
}
