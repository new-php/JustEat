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

        $category = Category::factory()->create([
            'name' => 'Hamburguesas',
            'image' => 'storage/app/public/images/main-page-background.jpg',
        ]);

        $restaurant = Restaurant::factory()->create([
            'id' => 1,
            'name' => 'McDonalds',
            'category' => $category,
            'address' => 'Avinguda de Rio de Janeiro, 42, Barcelona, 08016',
            'min_delivery_time' => 1,
            'max_delivery_time' => 2,
            'price_delivery' => 3,
            'min_order_price' => 5,
        ]);

        $this->browse(function (Browser $browser) use ($restaurant, $category) {
            $browser->visit(new RestaurantPage($restaurant->id))
                ->assertSee($restaurant->name)
                ->assertSee($restaurant->category->name)
                ->assertSee($restaurant->address)
                ->assertSee('Tiempo de entrega') 
                ->assertSee($restaurant->min_delivery_time)
                ->assertSee('-')
                ->assertSee($restaurant->max_delivery_time)
                ->assertSee($restaurant->price_delivery)
                ->assertSee('€ gastos de envío')
                ->assertSee('Pedido mínimo')
                ->assertSee($restaurant->min_order_price);
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

        $product_category = ProductCategory::factory()->create([
            'name' => 'Top Ventas',
        ]);

        $product = Product::factory()->create([
            'name' => 'McMenú CBO',
            'price' => 8.25,
            'description' => 'Bacon, cebolla, lechuga y pollo supreme',
            'product_category' => $product_category->name,
        ]);

        $restaurant = Restaurant::factory()->create([
            'id' => 1,
            'name' => 'McDonalds',
            'product_categories' => $product_category,
            'product' => $product,
        ]);

        $this->browse(function (Browser $browser) use ($restaurant, $product_category, $product) {
            $browser->visit(new RestaurantPage($restaurant->id))
                ->assertSee($restaurant->product->product_category->name)
                ->assertSee($restaurant->product->name)
                ->assertSee($restaurant->product->description)
                ->assertSee($restaurant->product->price);
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
