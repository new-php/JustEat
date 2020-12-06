<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\OrderPaymentPage;
use App\Models\Order;

class PaymentTest extends DuskTestCase
{
	use DatabaseMigrations;

	/**
	 * Default Payment Radio
	 * @group payment
     * @return void
	 **/
	public function testDefaultRadio()
    {
        $order = Order::factory(['status' => 'TIMED'])->create();

        $this->browse(function (Browser $browser) use ($order) {
            $browser->visit(new OrderPaymentPage($order->id))
    		        ->click('@radio-default')
    		        ->assertSee('Tengo un código de descuento')
    		        ->assertDontSee('Número de tarjeta')
    		        ->assertDontSee('Guardar mis detalles de PayPal');
        });
	}

	/**
	 * Card Payment Radio
     * @group payment
     * @return void
	 **/
	public function testCardRadio()
    {
        $order = Order::factory(['status' => 'TIMED'])->create();

        $this->browse(function (Browser $browser) use ($order) {
            $browser->visit(new OrderPaymentPage($order->id))
		            ->click('@radio-card')
		            ->assertSee('Número de tarjeta');
        });
	}

	/**
	 * Paypal Payment Radio
     * @group payment
     * @return void
	 **/
	public function testPaypalRadio()
    {
        $order = Order::factory(['status' => 'TIMED'])->create();

        $this->browse(function (Browser $browser) use ($order) {
            $browser->visit(new OrderPaymentPage($order->id))
		            ->click('@radio-paypal')
		            ->assertSee('Guardar mis detalles de PayPal');
        });
	}

	/**
	 * Cash Payment Radio
     * @group payment
     * @return void
	 **/
	public function testCashRadio()
    {
        $order = Order::factory(['status' => 'TIMED'])->create();

        $this->browse(function (Browser $browser) use ($order) {
            $browser->visit(new OrderPaymentPage($order->id))
		            ->click('@radio-cash')
		            ->assertSee('Hacer mi pedido')
		            ->assertDontSee('Tengo un código de descuento')
		            ->assertDontSee('Número de tarjeta')
		            ->assertDontSee('Guardar mis detalles de PayPal');
        });
	}

	/**
	 * Default Payment Coupon
     * @group payment
     * @return void
	 **/
	public function testDefaultCoupon()
    {
        $order = Order::factory(['status' => 'TIMED'])->create();

		$this->browse(function (Browser $browser) use ($order) {
            $browser->visit(new OrderPaymentPage($order->id))
                    ->click('@radio-default')
                    ->click('@default-coupon')
                    ->assertSee('Tengo un código de descuento')
                    ->assertDontSee('Número de tarjeta')
                    ->assertDontSee('Guardar mis detalles de PayPal')
                    ->assertSee('Aplicar');
        });
	}

	/**
	 * Card Payment Coupon
     * @group payment
     * @return void
	 **/
	public function testCardCoupon()
    {
        $order = Order::factory(['status' => 'TIMED'])->create();

        $this->browse(function (Browser $browser) use ($order) {
            $browser->visit(new OrderPaymentPage($order->id))
                    ->click('@radio-card')
                    ->click('@card-coupon')
                    ->assertSee('Número de tarjeta')
                    ->assertSee('Aplicar');
        });
	}

	/**
	 * Paypal Payment Coupon
     * @group payment
     * @return void
	 **/
	public function testPaypalCoupon()
    {
        $order = Order::factory(['status' => 'TIMED'])->create();

        $this->browse(function (Browser $browser) use ($order) {
            $browser->visit(new OrderPaymentPage($order->id))
                    ->click('@radio-paypal')
                    ->click('@paypal-coupon')
                    ->assertSee('Guardar mis detalles de PayPal')
                    ->assertSee('Aplicar');
        });
	}
}
