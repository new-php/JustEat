<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\UserAccountPage;
use App\Models\User;
use App\Models\Address;

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

    /**
     * A Dusk test example.
     * @group accListAddresses
     * @return void
     */
    public function testAddressText()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new UserAccountPage)   
                ->click('#dir-reparto')            
                ->assertSee('Libreta de direcciones')
                ->assertSee('Crea y guarda direcciones de entrega para hacer tus pedidos')
                ->assertSee('fácilmente');
        });
    }

    /**
     * A Dusk test example.
     * @group accListAddresses1
     * @return void
     */
    public function testSeeAddress()
    {

        $user = User::factory()->create();

        $address = Address::factory()->create([
            'user_id' => $user->id,
        ]);
        
        $this->artisan('passport:install');

        $token = $user->createToken('authToken')->accessToken;

        $script = "window.localStorage.setItem('auth_token', '".$token."')";

        $this->browse(function (Browser $browser) use ($address, $script) {
            $browser->visit(new UserAccountPage) 
                ->script($script);
            $browser->visit(new UserAccountPage) 
                ->click('#dir-reparto')            
                ->assertSee($address->postal_code)
                ->assertSee($address->address_line_1);
        });
    }

    /**
     * A Dusk test example.
     * @group accListAddresses
     * @return void
     */
    public function testLinkEdit()
    {

        $address = Address::factory()->create([
            'postal_code' => "08950",
            'address_line_1' => "Carrer dels Caquis, 2, Bajos, 2, 08950, Espluguas de Llobregat",
        ]);

        $this->browse(function (Browser $browser) use ($address) {
            $browser->visit(new UserAccountPage)   
                ->click('#dir-reparto')            
                ->assertSee($address->postal_code)
                ->assertSee($address->address_line_1)
                ->seeLink('#link-edit')
                ->clickLink('Editar')
                ->assertPathIs("/");
        });
    }

    /**
     * A Dusk test example.
     * @group accListAddresses
     * @return void
     */
    public function testLinkDelete()
    {

        $address = Address::factory()->create([
            'postal_code' => "08950",
            'address_line_1' => "Carrer dels Caquis, 2, Bajos, 2, 08950, Espluguas de Llobregat",
        ]);

        $this->browse(function (Browser $browser) use ($address) {
            $browser->visit(new UserAccountPage)   
                ->click('#dir-reparto')            
                ->assertSee($address->postal_code)
                ->assertSee($address->address_line_1)
                ->seeLink('#link-delete')
                ->clickLink('Eliminar')
                ->assertDontSee($address->postal_code)
                ->assertDontSee($address->address_line_1);
        });
    }
}
