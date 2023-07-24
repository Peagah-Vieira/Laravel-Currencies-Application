<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LogoutTest extends DuskTestCase
{
    use DatabaseMigrations;

    const ROUTE_USER_DASHBOARD = 'dashboard';

    protected function setUp(): void
    {
        // Prerequisite steps
        parent::setUp();

        // Freshing the database
        $this->artisan('migrate:fresh');

        // Create a user for testing purposes
        $this->user = User::factory()->create();
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

    public function test_user_logout_is_working_as_expected(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->user)
                ->visit(self::ROUTE_USER_DASHBOARD)
                ->click('@profile_dropdown')
                ->clickLink('Log Out')
                ->assertPathIs('/');
        });
    }
}
