<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    /**
     * Redirect the user to authenticate with github
     *
     * @return redirect
     */
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Receives data provided by github and treats it
     *
     * @return redirect
     */
    public function github_callback()
    {
        $github_user = Socialite::driver('github')->user();

        # If there is already a user with the email provided by github it is authenticated,
        # if it does not find a user it is created
        $user = User::query()->firstOrCreate(
            [
                'email' => $github_user->getEmail(),
            ],
            [
                'name' => $github_user->getName(),
                'password' => bcrypt(Str::random(10)),
            ]
        );

        Auth::login($user);

        return redirect()->intended('dashboard');
    }
}
