<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\OrderPaymentPage;


class PaymentTest extends DuskTestCase {
	use DatabaseMigrations;

	/**
	 * Default Payment Radio
	 *
	 **/
	public function testDefaultRadio(){
        $this->browse(function (Browser $browser) {
            $browser->visit(new OrderPaymentPage)
    		        ->click('@radio-default')
    		        ->assertSee('Tengo un código de descuento')
    		        ->assertDontSee('Número de tarjeta')
    		        ->assertDontSee('Guardar mis detalles de PayPal');
        });
	}

	/**
	 * Card Payment Radio
	 *
	 **/
	public function testCardRadio(){
        $this->browse(function (Browser $browser) {
            $browser->visit(new OrderPaymentPage)
		            ->click('@radio-card')
		            ->assertSee('Número de tarjeta');
        });
	}

	/**
	 * Paypal Payment Radio
	 *
	 **/
	public function testPaypalRadio(){
        $this->browse(function (Browser $browser) {
            $browser->visit(new OrderPaymentPage)
		            ->click('@radio-paypal')
		            ->assertSee('Guardar mis detalles de PayPal');
        });
	}

	/**
	 * Cash Payment Radio
	 *
	 **/
	public function testCashRadio(){
        $this->browse(function (Browser $browser) {
            $browser->visit(new OrderPaymentPage)
		            ->click('@radio-cash')
		            ->assertSee('Hacer mi pedido')
		            ->assertDontSee('Tengo un código de descuento')
		            ->assertDontSee('Número de tarjeta')
		            ->assertDontSee('Guardar mis detalles de PayPal');
        });
	}




	/**
	 * Default Payment Coupon
	 *
	 **/
	public function testDefaultCoupon(){
		$this->browse(function (Browser $browser) {
            $browser->visit(new OrderPaymentPage)
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
	 *
	 **/
	public function testCardCoupon(){
		$this->browse(function (Browser $browser) {
            $browser->visit(new OrderPaymentPage)
                    ->click('@radio-card')
                    ->click('@card-coupon')
                    ->assertSee('Número de tarjeta')
                    ->assertSee('Aplicar');
        });
	}

	/**
	 * Paypal Payment Coupon
	 *
	 **/
	public function testPaypalCoupon(){
		$this->browse(function (Browser $browser) {
            $browser->visit(new OrderPaymentPage)
                    ->click('@radio-paypal')
                    ->click('@paypal-coupon')
                    ->assertSee('Guardar mis detalles de PayPal')
                    ->assertSee('Aplicar');
        });
	}
}
