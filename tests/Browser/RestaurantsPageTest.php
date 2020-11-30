<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\RestaurantsPage;
use App\Models\Restaurant;
use App\Models\Category;

class RestaurantsPageTest extends DuskTestCase
{

    use DatabaseMigrations;

    /**
     * Press header category to select.
     *
     * @group restaurants
     * @return void
     */
    public function testSelectHeaderCategoryAsign()
    {
        $restaurant = Restaurant::factory()
            ->has(Category::factory()->count(1))
            ->create();

        $this->browse(function (Browser $browser) use ($restaurant) {
            $browser->visit(new RestaurantsPage)
                    ->assertSee($restaurant->name)
                    ->click('#mainCategory-1')
                    ->assertSee($restaurant->name)
                    ->clickLink('Reiniciar')
                    ->assertSee($restaurant->name);
        });
    }

    /**
     * Press header category to select.
     *
     * @group restaurants
     * @return void
     */
    public function testSelectHeaderCategoryUnAsign()
    {
        $restaurant = Restaurant::factory()
            ->create();
        $category = Category::factory()
            ->create();

        $this->browse(function (Browser $browser) use ($restaurant) {
            $browser->visit(new RestaurantsPage)
                    ->assertSee($restaurant->name)
                    ->click('#mainCategory-1')
                    ->assertDontSee($restaurant->name)
                    ->clickLink('Reiniciar')
                    ->assertSee($restaurant->name);
        });
    }

    /**
     * Press header category to select.
     *
     * @group restaurants
     * @return void
     */
    public function testSelectCategoryAsign()
    {
        $restaurant = Restaurant::factory()
            ->has(Category::factory()->count(1))
            ->create();

        $this->browse(function (Browser $browser) use ($restaurant) {
            $browser->visit(new RestaurantsPage)
                    ->assertSee($restaurant->name)
                    ->click('#category-1')
                    ->assertSee($restaurant->name)
                    ->clickLink('Reiniciar')
                    ->assertSee($restaurant->name);
        });
    }

     /**
     * Press header category to select.
     *
     * @group restaurants
     * @return void
     */
    public function testSelectCategoryUnAsign()
    {
        $restaurant = Restaurant::factory()
            ->create();
        $category = Category::factory()
            ->create();

        $this->browse(function (Browser $browser) use ($restaurant) {
            $browser->visit(new RestaurantsPage)
                    ->assertSee($restaurant->name)
                    ->click('#category-1')
                    ->assertDontSee($restaurant->name)
                    ->clickLink('Reiniciar')
                    ->assertSee($restaurant->name);
        });
    }

    /**
     * Press and go to the MainPage.
     *
     * @group restaurants
     * @return void
     */
    public function testChangeAdress()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new RestaurantsPage)
            ->clickLink('cambiar dirección')
            ->assertPathIs('/');
        });
    }

    /**
     * Press to search.
     *
     * @group restaurants
     * @return void
     */
    public function testSearchBarMatch()
    {
        $restaurant = Restaurant::factory()
            ->create([
            'name' => 'McKing',
        ]);

        $this->browse(function (Browser $browser) use ($restaurant) {
            $browser->visit(new RestaurantsPage)
            ->assertSee($restaurant->name);
        });
    }

    /**
     * Press to search.
     *
     * @group restaurants
     * @return void
     */
    public function testSearchBarUnMatch()
    {

        $restaurant = Restaurant::factory()
            ->create([
            'name' => 'McKing',
        ]);

        $this->browse(function (Browser $browser) use ($restaurant) {
            $browser->visit(new RestaurantsPage)
            ->assertSee($restaurant->name)
            ->type('restaurants-searchbar', 'asddgghhgk')
            ->assertDontSee($restaurant->name);
        });
    }

    /**
     * Show the cards and press them.
     *
     * @group restaurants
     * @return void
     */
    public function testRestaurantsCards()
    {
        $restaurant = Restaurant::factory()
            ->create();

        $this->browse(function (Browser $browser) use ($restaurant) {
            $browser->visit(new RestaurantsPage)
            ->click('#restaurant-1')
            ->assertPathIs('/restaurants/'.$restaurant->id);
        });
    }

}
