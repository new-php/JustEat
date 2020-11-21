<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\LoginPage;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

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
            $browser->visit(new LoginPage)
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
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage)
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
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage)
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
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage)
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
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage)
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
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage)
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

        $this->artisan('passport:install');

        \DB::table('oauth_clients')->where('password_client', 1)->update(['secret' => 'WzcCcKmUuZGpa8fq46MCZl6TDRKLoGmkEEimjaAq']);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(new LoginPage)
                    ->assertSee('Inicia sesión')
                    ->type('@email', $user->email)
                    ->type('@password', 'password')
                    ->press('@Login')
                    ->refresh()
                    ->assertPathIs('/');
        });
    }
}
