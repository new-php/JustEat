<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\OrderDeliveryTimePage;
use App\Models\Order;
use App\Models\User;

class OrderDeliveryTimeTest extends DuskTestCase
{
	use DatabaseMigrations;

    /**
	 * Check we go to next page with correct input
	 * @group delivery
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
            $browser->visit(new OrderDeliveryTimePage($order->id)) 
                    ->script($script);
            $browser->visit(new OrderDeliveryTimePage($order->id))
                    ->type('@details', 'test')
                    ->press('@continuar-button')
                    ->pause(1000)
                    ->assertPathIs('/order/' . $order->id . '/payment');
        });
    }

    /**
	 * Check we go to next page with correct input
	 * @group delivery
     * @return void
	 **/
	public function testCorrectWorkflowNoDetails()
    {
        $user = User::factory()->create();

        $order = Order::factory(['status' => 'TIMED',
                                 'user_id' => $user->id])->create();

        $this->artisan('passport:install');

        $token = $user->createToken('authToken')->accessToken;

        $script = "window.localStorage.setItem('auth_token', '".$token."')";

        $this->browse(function (Browser $browser) use ($order, $script) {
            $browser->visit(new OrderDeliveryTimePage($order->id)) 
                    ->script($script);
            $browser->visit(new OrderDeliveryTimePage($order->id))
                    ->press('@continuar-button')
                    ->pause(1000)
                    ->assertPathIs('/order/' . $order->id . '/payment');
        });
    }
}
