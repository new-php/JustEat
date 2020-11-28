<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;
use App\Models\User;

class GetUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Get Existing User while being auth'd
     *
     * @return void
     */
    public function testGetUser()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['check-status']
        );

        $getResponse = $this->get('/api/v1/user/');

        $getResponse->assertStatus(200)
                    ->assertJsonStructure(
                        ['data' => [
                            'name',
                            'phone',
                            'email',
                            'email_verified_at',
                            'updated_at',
                            'created_at',
                            'id'
                        ]]
                    );;

        $this->assertEquals($getResponse['data']['id'], $user['id']);
    }

    /**
     * Get current user without logging in, expecting redirection
     * 
     * @return void
     */
    public function testGetUserWithNoUserLogged()
    {
        $getResponse = $this->get('/api/v1/user/');
        $this->assertEquals($getResponse->status(), 302);
    }
}