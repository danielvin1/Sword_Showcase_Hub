<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToGoogle()
    {
        if (! config('services.google.client_id') || ! config('services.google.client_secret')) {
            return redirect('/login')->with('error', 'Google OAuth is not configured. Set GOOGLE_CLIENT_ID and GOOGLE_CLIENT_SECRET in your .env file.');
        }

        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Throwable $exception) {
            Log::error('Google OAuth callback failed', ['error' => $exception->getMessage()]);
            return redirect('/login')->with('error', 'Google sign-in failed. Please try again.');
        }

        $email = $googleUser->getEmail();

        if (! $email) {
            return redirect('/login')->with('error', 'Google did not return an email address.');
        }

        $user = User::where(function ($query) use ($googleUser, $email) {
            $query->where('provider_name', 'google')
                ->where('provider_id', $googleUser->getId());
        })->orWhere('email', $email)->first();

        if (! $user) {
            $user = User::create([
                'name' => $googleUser->getName() ?: $googleUser->getNickname() ?: 'Google User',
                'email' => $email,
                'provider_name' => 'google',
                'provider_id' => $googleUser->getId(),
                'profile_photo' => $googleUser->getAvatar(),
                'password' => Hash::make(Str::random(16)),
            ]);
        } else {
            $updates = [];

            if (! $user->provider_name || ! $user->provider_id) {
                $updates['provider_name'] = 'google';
                $updates['provider_id'] = $googleUser->getId();
            }

            if (! $user->profile_photo && $googleUser->getAvatar()) {
                $updates['profile_photo'] = $googleUser->getAvatar();
            }

            if ((! $user->name || $user->name === 'Google User') && $googleUser->getName()) {
                $updates['name'] = $googleUser->getName();
            }

            if ($updates) {
                $user->update($updates);
            }
        }

        session([
            'logged_in' => true,
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
            'profile_photo' => $user->profile_photo,
        ]);

        return redirect('/feed');
    }
}
