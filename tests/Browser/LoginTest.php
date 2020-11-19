<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\Login;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * Login fail
     *
     * @group auth
     * @group login
     * @return void
     */
    public function testLoginFail()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(new Login)
                    ->assertSee('Inicia sesión')
                    ->type('@email', $user->email)
                    ->type('@password', 'fail')
                    ->press('@Login')
                    ->assertPathIs('/login')
                    ->assertGuest('api');
        });
    }

    /**
     * Reset password link
     *
     * @group auth
     * @group login
     * @return void
     */
    public function testResetPasswordLink()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(new Login)
                    ->assertSee('Inicia sesión')
                    ->clickLink('¿Has olvidado tu contraseña?')
                    ->assertPathIs('/password/reset');
        });
    }

    /**
     * Create account link
     *
     * @group auth
     * @group login
     * @return void
     */
    public function testCreateAccountLink()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(new Login)
                    ->assertSee('Inicia sesión')
                    ->clickLink('Crear cuenta')
                    ->assertPathIs('/register');
        });
    }

    /**
     * Terms and conditions link
     *
     * @group auth
     * @group login
     * @return void
     */
    public function testTermsAndConditionsLink()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(new Login)
                    ->assertSee('Inicia sesión')
                    ->clickLink('términos y condiciones')
                    ->assertPathIs('/login');
        });
    }

    /**
     * Privacy policy link
     *
     * @group auth
     * @group login
     * @return void
     */
    public function testPrivacyPolicyLink()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(new Login)
                    ->assertSee('Inicia sesión')
                    ->clickLink('política de privacidad')
                    ->assertPathIs('/login');
        });
    }

    /**
     * Cookie Policy link
     *
     * @group auth
     * @group login
     * @return void
     */
    public function testCookiePolicyLink()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(new Login)
                    ->assertSee('Inicia sesión')
                    ->clickLink('política de cookies')
                    ->assertPathIs('/login');
        });
    }

    /**
     * Login success
     *
     * @group auth
     * @group login
     * @return void
     */
    public function testLogin()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(new Login)
                    ->assertSee('Inicia sesión')
                    ->type('@email', $user->email)
                    ->type('@password', 'password')
                    ->press('@Login')
                    ->refresh()
                    ->assertPathIs('/');
        });
    }
}
