<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\OrderPayment;


class PaymentTest extends DuskTestCase {
	use DatabaseMigrations;

	/**
	 * Default Payment Radio
	 *
	 **/
	public function testDefaultRadio(){
		$browser->click('@radio-default');
		$browser->assertSee('Tengo un código de descuento');
		$browser->assertDontSee('Número de tarjeta');
		$browser->assertDontSee('Guardar mis detalles de PayPal');
	}

	/**
	 * Card Payment Radio
	 *
	 **/
	public function testCardRadio(){
		$browser->click('@radio-card');
		$browser->assertSee('Número de tarjeta');
	}

	/**
	 * Paypal Payment Radio
	 *
	 **/
	public function testPaypalRadio(){
		$browser->click('@radio-paypal');
		$browser->assertSee('Guardar mis detalles de PayPal');
	}

	/**
	 * Cash Payment Radio
	 *
	 **/
	public function testCashRadio(){
		$browser->click('@radio-cash');
		$browser->assertSee('Hacer mi pedido');
		$browser->assertDontSee('Tengo un código de descuento');
		$browser->assertDontSee('Número de tarjeta');
		$browser->assertDontSee('Guardar mis detalles de PayPal');
	}




	/**
	 * Default Payment Coupon
	 *
	 **/
	public function testDefaultCoupon(){
		$browser->click('@radio-default');
		$browser->click('@default-coupon')
		$browser->assertSee('Tengo un código de descuento');
		$browser->assertDontSee('Número de tarjeta');
		$browser->assertDontSee('Guardar mis detalles de PayPal');
		$browser->assertSee('Aplicar');
	}

	/**
	 * Card Payment Coupon
	 *
	 **/
	public function testCardCoupon(){
		$browser->click('@radio-card');
		$browser->click('@card-coupon');
		$browser->assertSee('Número de tarjeta');
		$browser->assertSee('Aplicar');
	}

	/**
	 * Paypal Payment Coupon
	 *
	 **/
	public function testPaypalCoupon(){
		$browser->click('@radio-paypal');
		$browser->click('@paypal-coupon');
		$browser->assertSee('Guardar mis detalles de PayPal');
		$browser->assertSee('Aplicar');
	}
}