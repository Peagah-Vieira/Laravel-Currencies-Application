<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProfileTest extends DuskTestCase
{
    use DatabaseMigrations;

    const ROUTE_USER_PROFILE = '/profile';

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

    public function test_user_name_update_is_working_as_expected(): void
    {
        $this->browse(function (Browser $browser) {
            $new_name = 'John Doe';
            $browser
                ->loginAs($this->user)
                ->visit(self::ROUTE_USER_PROFILE)
                ->type('name', $new_name)
                ->click("@profile_update_button")
                ->assertSee('Saved.')
                ->logout();
        });
    }

    public function test_user_email_update_is_working_as_expected(): void
    {
        $this->browse(function (Browser $browser) {
            $new_email = 'newemail@gmail.com';
            $browser
                ->loginAs($this->user)
                ->visit(self::ROUTE_USER_PROFILE)
                ->type('email', $new_email)
                ->click("@profile_update_button")
                ->assertSee('Saved.')
                ->logout();
        });
    }

    public function test_user_password_update_is_working_as_expected(): void
    {
        $this->browse(function (Browser $browser) {
            $string_password = 'Ver@ify12';
            $new_password = 'newpassword';
            $browser
                ->loginAs($this->user)
                ->visit(self::ROUTE_USER_PROFILE)
                ->type('current_password', $string_password)
                ->type('password', $new_password)
                ->type('password_confirmation', $new_password)
                ->click("@password_update_button")
                ->assertSee('Saved.')
                ->logout();
        });
    }

    public function test_user_delete_is_working_as_expected(): void
    {
        $this->browse(function (Browser $browser) {
            $string_password = 'Ver@ify12';
            $browser
                ->loginAs($this->user)
                ->visit(self::ROUTE_USER_PROFILE)
                ->click('@delete_button')
                ->waitForText('Are you sure you want to delete your account?')
                ->type('@confirm_delete_password', $string_password)
                ->click('@confirm_delete_button')
                ->assertPathIs('/');
        });
    }
}
