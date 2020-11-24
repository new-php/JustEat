<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\MainPage;

class MainPageTest extends DuskTestCase
{
    
    use DatabaseMigrations;


    /**
     * Search restaurant by address success
     * @group mainPage
     * @return void
     */
    public function testSearchAddress()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new mainPage)
                    ->assertSee('Pide lo que te pida el cuerpo')
                    ->assertSee('Comida a domicilio online cerca de ti')
                    ->type('@address', 'Carrer del Congrés, Barcelona, España')
                    ->press('@searchRest')
                    ->refresh()
                    ->assertPathIs('/restaurants?address=Carrer del Congrés, 08031 Barcelona, España&zip=08031');
        });
    }

    /**
     * Search restaurant by address fail
     * @group mainPage
     * @return void
     */
    public function testSearchAddressFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new mainPage)
                    ->assertSee('Pide lo que te pida el cuerpo')
                    ->assertSee('Comida a domicilio online cerca de ti')
                    ->type('@address', 'fail')
                    ->press('@searchRest')
                    ->assertPathIs('/');
        });
    }

    /**
     * Search better restaurants section
     * @group mainPage
     * @return void
     */
    public function testBetterRestaurants()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new mainPage)
                    ->assertSee('Los mejores restaurantes')
                    ->assertSee('Pide comida a domicilio, o para recoger, en la mejor selección de restaurantes de España.')
                    ->press('#searchBetterRest')
                    ->assertPathIs('/');
        });
    }

    /**
     * App section apple
     * @group mainPage
     * @return void
     */
    public function testAppSectionApple()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new mainPage)
                    ->assertSee('Pide lo que te pida el cuerpo aún más rápido')
                    ->assertSee('Descárgate gratis la app y pide tu comida a domicilio estés donde estés.')
                    ->click('a[href="https://www.apple.com/app-store/"]')
                    ->pause(1000)
                    ->assertUrlIs('https://www.apple.com/app-store/');
        });
    }

    /**
     * App section googleApp
     * @group mainPage
     * @return void
     */
    public function testAppSectionGoogleApp()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new mainPage)
                    ->assertSee('Pide lo que te pida el cuerpo aún más rápido')
                    ->assertSee('Descárgate gratis la app y pide tu comida a domicilio estés donde estés.')
                    ->click('a[href="https://play.google.com/store"]')
                    ->pause(1000)
                    ->assertUrlIs('https://play.google.com/store');
        });
    }

    /**
     * navBar Logo
     * @group mainPage
     * @return void
     */
    public function testNavbarLinkLogo()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new mainPage)
                    ->assertSee('Pide lo que te pida el cuerpo')
                    ->assertSee('Comida a domicilio online cerca de ti')
                    ->click('a[href="/"]')
                    ->assertPathIs('/');
        });
    }

    /**
     * navBar Login
     * @group mainPage
     * @return void
     */
    public function testNavbarLinkLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new mainPage)
                    ->assertSee('Pide lo que te pida el cuerpo')
                    ->assertSee('Comida a domicilio online cerca de ti')
                    ->clickLink('Inicia sesión')
                    ->assertPathIs('/login');
        });
    }

    /**
     * navBar ParaTi
     * @group mainPage
     * @return void
     */
    public function testNavbarLinkParaTi()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new mainPage)
                    ->assertSee('Pide lo que te pida el cuerpo')
                    ->assertSee('Comida a domicilio online cerca de ti')
                    ->clickLink('Para ti');
                    //->assertPathIs('#');
        });
    }

    /**
     * navBar Ayuda
     * @group mainPage
     * @return void
     */
    public function testNavbarLinkAyuda()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new mainPage)
                    ->assertSee('Pide lo que te pida el cuerpo')
                    ->assertSee('Comida a domicilio online cerca de ti')
                    ->clickLink('Ayuda');
                    //->assertPathIs('#');
        });
    }

    /**
     * photos
     * @group mainPage
     * @return void
     */
    public function testPhotos()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new mainPage)
                ->attach('photo', storage_path('app/public/images/main-page-background.jpg'))
                ->attach('photo', storage_path('app/public/images/main-page-screen.png'))
                ->attach('photo', storage_path('app/public/images/mobile-app.png'));
        });
    }

    
}
