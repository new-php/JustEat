<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\RegisterPage;
use App\Models\User;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Register fail
     *
     * @group auth
     * @group register
     * @return void
     */
    public function testRegisterFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new RegisterPage)
                    ->assertSee('Regístrate en Just Eat')
                    ->type('@email', 'test@test.com')
                    ->type('@password', '12345678')
                    ->type('@password_confirmation', 'abcdefgh')
                    ->press('@Register')
                    ->assertPathIs('/register')
                    ->assertGuest('api');
        });
    }

    /**
     * Register fail duplicate mail
     *
     * @group auth
     * @group register
     * @return void
     */
    public function testRegisterDuplicateMail()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(new RegisterPage)
                    ->assertSee('Regístrate en Just Eat')
                    ->type('@email', $user->email)
                    ->type('@password', 'fail')
                    ->type('@password_confirmation', 'fail')
                    ->press('@Register')
                    ->assertPathIs('/register')
                    ->assertGuest('api');
        });
    }

    /**
     * Login link
     *
     * @group auth
     * @group register
     * @return void
     */
    public function testLoginLink()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new RegisterPage)
                    ->assertSee('Regístrate en Just Eat')
                    ->clickLink('Inicia sesión')
                    ->assertPathIs('/login');
        });
    }

    /**
     * Terms and conditions link
     *
     * @group auth
     * @group register
     * @return void
     */
    public function testTermsAndConditionsLink()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new RegisterPage)
                    ->assertSee('Regístrate en Just Eat')
                    ->clickLink('términos y condiciones')
                    ->assertPathIs('/register');
        });
    }

    /**
     * Privacy policy link
     *
     * @group auth
     * @group register
     * @return void
     */
    public function testPrivacyPolicyLink()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new RegisterPage)
                    ->assertSee('Regístrate en Just Eat')
                    ->clickLink('política de privacidad')
                    ->assertPathIs('/register');
        });
    }

    /**
     * Cookie Policy link
     *
     * @group auth
     * @group register
     * @return void
     */
    public function testCookiePolicyLink()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new RegisterPage)
                    ->assertSee('Regístrate en Just Eat')
                    ->clickLink('política de cookies')
                    ->assertPathIs('/register');
        });
    }

    /**
     * Register success
     *
     * @group auth
     * @group register
     * @return void
     */
    public function testRegister()
    {
        $this->artisan('passport:install');

        $this->browse(function (Browser $browser) {
            $browser->visit(new RegisterPage)
                    ->assertSee('Regístrate en Just Eat')
                    ->type('@email', 'test@test.com')
                    ->type('@password', 'password')
                    ->type('@password_confirmation', 'password')
                    ->press('@Register')
                    ->refresh()
                    ->assertPathIs('/');
        });
    }
}
