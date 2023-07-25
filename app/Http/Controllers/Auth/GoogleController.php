<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect the user to authenticate with google
     *
     * @return redirect
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Receives data provided by google and treats it
     *
     * @return redirect
     */
    public function google_callback()
    {
        $google_user = Socialite::driver('google')->user();

        # If there is already a user with the email provided by github it is authenticated,
        # if it does not find a user it is created
        $user = User::query()->firstOrCreate(
            [
                'email' => $google_user->getEmail(),
            ],
            [
                'name' => $google_user->getName(),
                'password' => bcrypt(Str::random(10)),
            ]
        );

        Auth::login($user);

        return redirect()->intended('dashboard');
    }
}
