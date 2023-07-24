<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ResetPasswordTest extends DuskTestCase
{
    use DatabaseMigrations;

    const ROUTE_PASSWORD_FORGOT = '/forgot-password';

    protected function setUp(): void
    {
        // Prerequisite steps
        parent::setUp();

        // Freshing the database
        $this->artisan('migrate:fresh');

        // Create user for testing purposes
        $this->user = User::factory()->create([
            'name' => 'John Smith',
            'email' => 'verified@gmail.com',
            'password' => 'Ver@ify12',
            'email_verified_at' => now(),
        ]);
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

    public function test_user_forgot_password_is_working_as_expected(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit(self::ROUTE_PASSWORD_FORGOT)
                ->type('email', $this->user->email)
                ->click('button[type="submit"]')
                ->waitForText('We have emailed your password reset link.')
                ->assertSee('We have emailed your password reset link.');
        });
    }
}
