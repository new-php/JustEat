<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;

class MainPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Asserting the main page view.
     *
     * @return void
     */
    public function testMainPage()
    {
        $category1 = Category::factory()->create();

        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertViewIs('main-page')
            ->assertViewHas('categories', Category::all());
    }
}
