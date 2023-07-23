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
    }

    public function test_unverified_user_login_is_working_as_expected(): void
    {
        $string_password = 'Unver@ify12';

        $user_unverified = User::factory()->create([
            'email' => 'unverified@gmail.com',
            'password' => $string_password,
            'email_verified_at' => null,
        ]);

        $this->browse(function (Browser $browser) use ($user_unverified, $string_password){
            $browser->visit('/login')
                    ->type('email', $user_unverified->email)
                    ->type('password', $string_password)
                    ->click('button[type="submit"]')
                    ->waitForLocation('/verify-email')
                    ->assertsee('Thanks for signing up!')
                    ->logout();
        });
    }

    public function test_verified_user_login_is_working_as_expected(): void
    {
        $string_password = 'Ver@ify12';

        $user_verified = User::factory()->create([
            'email' => 'verified@gmail.com',
            'password' => $string_password,
            'email_verified_at' => now(),
        ]);

        $this->browse(function (Browser $browser) use ($user_verified, $string_password){
            $browser->visit('/login')
                    ->type('email', $user_verified->email)
                    ->type('password', $string_password)
                    ->click('button[type="submit"]')
                    ->waitForLocation('/dashboard')
                    ->assertSee("You're logged in!")
                    ->logout();
        });
    }
}
