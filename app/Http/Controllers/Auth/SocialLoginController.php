<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    /**
     * Redirect the user to the Provider authentication page.
     *
     * @param $provider String
     * @return mixed
     */
    public function redirect_to_provider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Provider.
     *
     * @param $provider string
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle_provider_callback($provider)
    {
        $provider_user = Socialite::driver($provider)->user();

        $user = User::query()->firstOrCreate(
            [
                'email' => $provider_user->email,
            ],
            [
                'name' => $provider_user->name,
                'avatar' => $provider_user->avatar,
                'provider_id' => $provider_user->id,
                'provider_token' => $provider_user->token,
                'social_login' => true,
            ]
        );

        event(new Registered($user));

        Auth::login($user, true);

        return redirect('dashboard');
    }
}
