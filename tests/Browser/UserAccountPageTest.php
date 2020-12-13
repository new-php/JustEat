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
     * 
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
     * 
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
     * 
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
     * 
     * @group accListAddresses
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
                ->assertSee($address->address_name)      
                ->assertSee($address->address_line_1)
                ->assertSee($address->address_line_2);
        });
    }

    /**
     * 
     * @group accListAddresses
     * @return void
     */
    public function testLinkEdit()
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
                ->click('#link-edit')
                ->assertSee('Editar dirección')
                ->assertSee('Dirección')
                ->assertSee('Ciudad')
                ->assertSee('Código Postal')
                ->assertSee('Elige un nombre para esta dirección')
                ->assertSee('Casa')
                ->assertSee('Trabajo')
                ->assertSee('Añade tu propia dirección')
                ->assertSee('Ciudad')
                ->assertSee('Hecho')
                ->assertSee('Cancelar');
        });
    }

    /**
     * 
     * @group accListAddresses
     * @return void
     */
    public function testEditInputs()
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
                ->click('#link-edit')
                ->assertInputValue('#l1', $address->address_line_1)
                ->assertInputValue('#l2', $address->address_line_2)
                ->assertInputValue('#obs', $address->observations)
                ->assertInputValue('#city', $address->city)
                ->assertInputValue('#name', $address->address_name);
        });
    }

    /**
     * 
     * @group accListAddresses
     * @return void
     */
    public function testSaveButton()
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
                ->click('#link-edit')
                ->type('#name', 'Casa')
                ->click('#btnOk')
                ->refresh()
                ->click('#dir-reparto')
                ->click('#link-edit')
                ->assertInputValue('#name', 'Casa');
        });
    }

    /**
     * 
     * @group accListAddresses
     * @return void
     */
    public function testCancelButtons()
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
                ->click('#link-edit')
                ->type('#name', 'Casa')
                ->click('#btnCancel')
                ->refresh()
                ->click('#dir-reparto')
                ->click('#link-edit')
                ->assertInputValueIsNot('#name', 'Casa');
        });
    }

    /**
     * 
     * @group accListAddresses
     * @return void
     */
    public function testLinkDelete()
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
                ->click('#link-delete')
                ->refresh()
                ->click('#dir-reparto') 
                ->assertDontSee($address->address_name)
                ->assertDontSee($address->address_line_1)
                ->assertDontSee($address->address_line_2);
        });
    }
}
