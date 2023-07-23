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

        // Freshing the database
        $this->artisan('migrate:fresh');

        // Create a unverified email user for testing purposes
        $this->user_unverified = User::factory()->create([
            'name' => 'John Smith',
            'email' => 'unverified@gmail.com',
            'password' => 'Unver@ify12',
            'email_verified_at' => null,
        ]);

        // Create a verified email user for testing purposes
        $this->user_verified = User::factory()->create([
            'name' => 'John Smith',
            'email' => 'verified@gmail.com',
            'password' => 'Ver@ify12',
            'email_verified_at' => now(),
        ]);
    }

    public function test_unverified_user_login_is_working_as_expected(): void
    {
        $string_password = 'Unver@ify12';
        $this->browse(function (Browser $browser) use ($string_password) {
            $browser
                ->visit('/login')
                ->type('email', $this->user_unverified->email)
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
        $this->browse(function (Browser $browser) use ($string_password) {
            $browser
                ->visit('/login')
                ->type('email', $this->user_verified->email)
                ->type('password', $string_password)
                ->click('button[type="submit"]')
                ->waitForLocation('/dashboard')
                ->assertSee("You're logged in!")
                ->logout();
        });
    }
}
