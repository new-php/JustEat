<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserPageTest extends TestCase
{
    /**
     * Assert User view
     *
     * @return void
     */
    public function testUserAccountPage()
    {
        $response = $this->get('/account');

        $response->assertStatus(200)
            ->assertViewIs('user.account');
    }
}
