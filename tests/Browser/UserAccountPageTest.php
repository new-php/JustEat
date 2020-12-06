<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\UserAccountPage;
use App\Models\User;

class UserAccountPageTest extends DuskTestCase
{

    use DatabaseMigrations;

    /**
     * A Dusk test example.
     * @group account
     * @return void
     */
    public function testLinkInicio()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new UserAccountPage)
                ->assertSee('Inicio')
                ->clickLink('Inicio')
                ->assertPathIs('/');
        });
    }

    /**
     * A Dusk test example.
     * @group account
     * @return void
     */
    public function testTitulosTest()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new UserAccountPage)
                ->click('#info-user')
                ->assertSee('Información de la cuenta')
                ->click('#pedidos')
                ->assertSee('Pedidos')
                ->click('#dir-reparto')
                ->assertSee('Direcciones de reparto')
                ->click('#contacto')
                ->assertSee('Preferencias de contacto');
        });
    }
}
