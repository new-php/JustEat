<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    /**
     * Assert the Landing Page view
     *
     * @return void
     */
    public function testLandingPage()
    {
        $response = $this->get('/landingpage');

        $response->assertStatus(200)
            ->assertViewIs('landingPage');
    }
}
