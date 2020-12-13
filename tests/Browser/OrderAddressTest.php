<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\OrderAddressPage;
use App\Models\Order;
use App\Models\User;

class OrderAddressTest extends DuskTestCase
{
	use DatabaseMigrations;

	/**
	 * Check we stay on the same page if nothing is input
	 * @group address
     * @return void
	 **/
	public function testNoInput()
    {
        $user = User::factory()->create();

        $order = Order::factory(['status' => 'TIMED',
                                 'user_id' => $user->id])->create();

        $this->artisan('passport:install');

        $token = $user->createToken('authToken')->accessToken;

        $script = "window.localStorage.setItem('auth_token', '".$token."')";

        $this->browse(function (Browser $browser) use ($order, $script) {
            $browser->visit(new OrderAddressPage($order->id)) 
                    ->script($script);
            $browser->visit(new OrderAddressPage($order->id))
                    ->press('@continuar-button')
                    ->pause(1000)
    		        ->assertPathIs('/order/' . $order->id . '/delivery-address');
        });
    }
    
    /**
	 * Check we go to next page with correct input
	 * @group address
     * @return void
	 **/
	public function testCorrectWorkflow()
    {
        $user = User::factory()->create();

        $order = Order::factory(['status' => 'TIMED',
                                 'user_id' => $user->id])->create();

        $this->artisan('passport:install');

        $token = $user->createToken('authToken')->accessToken;

        $script = "window.localStorage.setItem('auth_token', '".$token."')";

        $this->browse(function (Browser $browser) use ($order, $script) {
            $browser->visit(new OrderAddressPage($order->id)) 
                    ->script($script);
            $browser->visit(new OrderAddressPage($order->id))
                    ->type('@name', 'test name')
                    ->type('@phone', '923 23 34 23')
                    ->type('@address1', 'Carrer Test')
                    ->type('@address2', 'Test 2')
                    ->type('@obs', 'obs test')
                    ->type('@city', 'Test City')
                    ->type('@post_code', '00230')
                    ->press('@continuar-button')
                    ->pause(1000)
                    ->assertPathIs('/order/' . $order->id . '/delivery-time');
        });
    }
    
    /**
     * Check we can change user
     * @group address
     * @return void
     */
    public function testChangeUsername()
    {
        $user = User::factory()->create();

        $order = Order::factory(['status' => 'TIMED',
                                 'user_id' => $user->id])->create();

        $this->artisan('passport:install');

        $token = $user->createToken('authToken')->accessToken;

        $script = "window.localStorage.setItem('auth_token', '".$token."')";

        $this->browse(function (Browser $browser) use ($order, $script) {
            $browser->visit(new OrderAddressPage($order->id)) 
                    ->script($script);
            $browser->visit(new OrderAddressPage($order->id))
                    ->click('@change-user')
                    ->pause(1000)
                    ->assertPathIs('/login');
        });
    }
}
