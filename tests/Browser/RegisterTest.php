<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;

    const ROUTE_USER_REGISTER = '/register';

    protected function setUp(): void
    {
        // Prerequisite steps
        parent::setUp();

        // Freshing the database
        $this->artisan('migrate:fresh');
    }

    protected function tearDown(): void
    {
        // Logout the user
        $this->browse(function (Browser $browser) {
            $browser->logout();

        });

        // Clean-up steps
        parent::tearDown();
    }

    public function test_user_register_is_working_as_expected(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit(self::ROUTE_USER_REGISTER)
                ->type('name', 'John Smith')
                ->type('email', 'johnsmith@gmail.com')
                ->type('password', 'J@hn Sm3th')
                ->type('password_confirmation', 'J@hn Sm3th')
                ->click('button[type="submit"]')
                ->waitForLocation('/verify-email')
                ->assertsee('Thanks for signing up!');
        });
    }
}
