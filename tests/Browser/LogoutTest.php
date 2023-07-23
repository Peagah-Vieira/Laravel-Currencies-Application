<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LogoutTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        // Freshing the database
        $this->artisan('migrate:fresh');

        // Create a user for testing purposes
        $this->user = User::factory()->create();
    }

    public function test_user_logout_is_working_as_expected(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->user)
                ->visit('/dashboard')
                ->click('@profile_dropdown')
                ->clickLink('Log Out')
                ->assertPathIs('/');
        });
    }
}
