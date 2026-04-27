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
    private const SUPPORTED_PROVIDERS = [
        'google' => [
            'label' => 'Google',
            'client_id_config' => 'services.google.client_id',
            'client_secret_config' => 'services.google.client_secret',
        ],
    ];

    public function redirect(string $provider)
    {
        $providerConfig = $this->providerConfig($provider);

        if (! config($providerConfig['client_id_config']) || ! config($providerConfig['client_secret_config'])) {
            return redirect('/login')->with(
                'error',
                sprintf(
                    '%s OAuth is not configured. Set the %s credentials in your .env file.',
                    $providerConfig['label'],
                    strtoupper($provider)
                )
            );
        }

        return Socialite::driver($provider)->redirect();
    }

    public function callback(Request $request, string $provider)
    {
        $providerConfig = $this->providerConfig($provider);

        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Throwable $exception) {
            Log::error(sprintf('%s OAuth callback failed', $providerConfig['label']), ['error' => $exception->getMessage()]);
            return redirect('/login')->with('error', sprintf('%s sign-in failed. Please try again.', $providerConfig['label']));
        }

        $email = $socialUser->getEmail();

        if (! $email) {
            return redirect('/login')->with('error', sprintf('%s did not return an email address.', $providerConfig['label']));
        }

        $user = User::where(function ($query) use ($provider, $socialUser) {
            $query->where('provider_name', $provider)
                ->where('provider_id', $socialUser->getId());
        })->orWhere('email', $email)->first();

        if (! $user) {
            $user = User::create([
                'name' => $socialUser->getName() ?: $socialUser->getNickname() ?: $providerConfig['label'] . ' User',
                'email' => $email,
                'provider_name' => $provider,
                'provider_id' => $socialUser->getId(),
                'profile_photo' => $socialUser->getAvatar(),
                'password' => Hash::make(Str::random(16)),
            ]);
        } else {
            $updates = [];

            if (! $user->provider_name || ! $user->provider_id) {
                $updates['provider_name'] = $provider;
                $updates['provider_id'] = $socialUser->getId();
            }

            if (! $user->profile_photo && $socialUser->getAvatar()) {
                $updates['profile_photo'] = $socialUser->getAvatar();
            }

            if ((! $user->name || str_ends_with($user->name, ' User')) && $socialUser->getName()) {
                $updates['name'] = $socialUser->getName();
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

    private function providerConfig(string $provider): array
    {
        abort_unless(array_key_exists($provider, self::SUPPORTED_PROVIDERS), 404);

        return self::SUPPORTED_PROVIDERS[$provider];
    }
}
