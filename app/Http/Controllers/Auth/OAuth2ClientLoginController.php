<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OAuth2ClientLoginController extends Controller
{
    public function login()
    {
        return Socialite::driver('users')->redirect();
    }

    public function callback()
    {

        $OAuth = Socialite::driver('users')->user();

        $user = User::firstOrCreate(
            ['email' => $OAuth->email],
            [
                'name' => $OAuth->name,
                'provider_id' => $OAuth->id,
                'token' => $OAuth->token,
                'refresh_token' => $OAuth->refreshToken,
                'expires_at' => now()->addSeconds($OAuth->expiresIn),
            ]
        );

        Auth::login($user);

        return redirect('/dashboard');
    }
}
