<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_user_register_is_working_as_expected(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'John Smith')
                    ->type('email', 'johnsmith@gmail.com')
                    ->type('password', 'J@hn Sm3th')
                    ->type('password_confirmation', 'J@hn Sm3th')
                    ->click('button[type="submit"]')
                    ->waitForText('Thanks for signing up!')
                    ->assertPathIs('/verify-email');
        });
    }
}
