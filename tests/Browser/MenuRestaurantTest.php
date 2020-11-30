<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\RestaurantPage;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\Product;

class MenuRestaurantTest extends DuskTestCase
{

    use DatabaseMigrations;

    /**
     * A Dusk test example.
     * @group menuRestPage
     * @return void
     */
    public function testLinkInicio()
    {

        $restaurant = Restaurant::factory()->create([
            'id' => 1,
        ]);

        $this->browse(function (Browser $browser) use ($restaurant) {
            $browser->visit(new RestaurantPage($restaurant->id))
                ->clickLink('Inicio')
                ->assertPathIs('/');
        });
    }

    /**
     * A Dusk test example.
     * @group menuRestPage
     * @return void
     */
    public function testLinkRestaurants()
    {

        $restaurant = Restaurant::factory()->create([
            'id' => 1,
        ]);

        $this->browse(function (Browser $browser) use ($restaurant) {
            $browser->visit(new RestaurantPage($restaurant->id))
                ->clickLink('Restaurants')
                ->assertPathIs('/restaurants');
        });
    }

    /**
     * A Dusk test example.
     * @group menuRestPage
     * @return void
     */
    public function testInfoRestaurant()
    {

        $restaurant = Restaurant::factory()->create([
            'id' => 1,
            'name' => 'McDonalds',
            'address' => 'Avinguda de Rio de Janeiro, 42, Barcelona, 08016',
        ]);

        $category = Category::factory()->create([
            'name' => 'Hamburguesas',
        ]);

        $category->restaurants()->attach($restaurant->id);

        $this->browse(function (Browser $browser) use ($restaurant, $category) {
            $browser->visit(new RestaurantPage($restaurant->id))
                ->assertSee($restaurant->name)
                ->assertSee($category->name)
                ->assertSee($restaurant->address);
        });
    }

    /**
     * A Dusk test example.
     * @group menuRestPage
     * @return void
     */
    public function testOptionPages()
    {

        $restaurant = Restaurant::factory()->create([
            'id' => 1,
        ]);

        $this->browse(function (Browser $browser) use ($restaurant) {
            $browser->visit(new RestaurantPage($restaurant->id))
                ->assertSee('Menú')
                ->assertSee('Info');
        });
    }

    /**
     * A Dusk test example.
     * @group menuRestPage
     * @return void
     */
    public function testProduct()
    {

        $restaurant = Restaurant::factory()->create([
            'id' => 1,
            'name' => 'McDonalds',
        ]);

        $product_category = ProductCategory::factory()->create([
            'name' => 'Top Ventas',
            'restaurant_id' => $restaurant->id,
        ]);

        $product = Product::factory()->create([
            'restaurant_id' => $restaurant->id,
            'name' => 'McMenú CBO',
            'price' => 8.25,
            'description' => 'Bacon, cebolla, lechuga y pollo supreme',
        ]);

        $product_category->products()->attach($product->id);

        $this->browse(function (Browser $browser) use ($restaurant, $product_category, $product) {
            $browser->visit(new RestaurantPage($restaurant->id))
                ->assertSee($product_category->name)
                ->assertSee($product->name)
                ->assertSee($product->description)
                ->assertSee($product->price);
        });
    }
    
    /**
     * A Dusk test example.
     * @group menuRestPage
     * @return void
     */
    public function testPedido()
    {

        $restaurant = Restaurant::factory()->create([
            'id' => 1,
        ]);

        $this->browse(function (Browser $browser) use ($restaurant) {
            $browser->visit(new RestaurantPage($restaurant->id))
                ->assertSee('Tu pedido')
                ->assertSee('Si tú o alguien para el que estás pidiendo tiene una alergia o intolerancia a algún alimento, haz clic aquí.')
                ->assertSee('A domicilio')
                ->assertSee('Para recoger');
        });
    }
}
