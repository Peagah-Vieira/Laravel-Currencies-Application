<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProfileTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
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

    public function test_user_name_update_is_working_as_expected(): void
    {
        $this->browse(function (Browser $browser) {
            $new_name = 'John Doe';
            $profile_information_save_button = '/html/body/div/main/div/div/div[1]/div/section/form[2]/div[3]/button';
            $browser
                ->loginAs($this->user)
                ->visit('/profile')
                ->type('name', $new_name)
                ->clickAtXPath($profile_information_save_button)
                ->assertSee('Saved.')
                ->logout();
        });
    }

    public function test_user_email_update_is_working_as_expected(): void
    {
        $this->browse(function (Browser $browser) {
            $new_email = 'newemail@gmail.com';
            $profile_information_save_button = '/html/body/div/main/div/div/div[1]/div/section/form[2]/div[3]/button';
            $browser
                ->loginAs($this->user)
                ->visit('/profile')
                ->type('email', $new_email)
                ->clickAtXPath($profile_information_save_button)
                ->assertSee('Saved.')
                ->logout();
        });
    }

    public function test_user_password_update_is_working_as_expected(): void
    {
        $this->browse(function (Browser $browser) {
            $string_password = 'Ver@ify12';
            $new_password = 'newpassword';
            $profile_password_save_button = '/html/body/div/main/div/div/div[2]/div/section/form/div[4]/button';
            $browser
                ->loginAs($this->user)
                ->visit('/profile')
                ->type('current_password', $string_password)
                ->type('password', $new_password)
                ->type('password_confirmation', $new_password)
                ->clickAtXPath($profile_password_save_button)
                ->assertSee('Saved.')
                ->logout();
        });
    }
}
