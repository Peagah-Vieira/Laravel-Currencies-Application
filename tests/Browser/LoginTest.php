<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate:fresh');

        User::factory()->create([
            'email' => 'unverified@gmail.com',
            'password' => 'Unver@ify12',
            'email_verified_at' => null,
        ]);

        User::factory()->create([
            'email' => 'verified@gmail.com',
            'password' => 'Ver@ify12',
            'email_verified_at' => now(),
        ]);
    }

    public function test_unverified_user_login_is_working_as_expected(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'unverified@gmail.com')
                    ->type('password', 'Unver@ify12')
                    ->click('button[type="submit"]')
                    ->waitForLocation('/verify-email')
                    ->assertsee('Thanks for signing up!')
                    ->logout();
        });
    }

    public function test_verified_user_login_is_working_as_expected(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'verified@gmail.com')
                    ->type('password', 'Ver@ify12')
                    ->click('button[type="submit"]')
                    ->waitForLocation('/dashboard')
                    ->assertSee("You're logged in!")
                    ->logout();
        });
    }
}
