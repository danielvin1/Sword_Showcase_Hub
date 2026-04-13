<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function toggle(Request $request, User $user)
    {
        $currentUser = $this->currentUser($request);

        if (! $currentUser) {
            return response()->json([
                'message' => 'Please log in first.',
            ], 401);
        }

        if ((int) $currentUser->id === (int) $user->id) {
            return response()->json([
                'message' => 'You cannot follow yourself.',
            ], 422);
        }

        $isFollowing = $currentUser->following()->where('followed_id', $user->id)->exists();

        if ($isFollowing) {
            $currentUser->following()->detach($user->id);
        } else {
            $currentUser->following()->attach($user->id);
        }

        return response()->json([
            'following' => ! $isFollowing,
            'button_label' => $isFollowing ? 'Follow' : 'Following',
            'follower_count' => $user->followers()->count(),
        ]);
    }

    private function currentUser(Request $request): ?User
    {
        $userId = $request->session()->get('user_id');

        if ($userId) {
            return User::find($userId);
        }

        $email = $request->session()->get('user_email');

        return $email ? User::where('email', $email)->first() : null;
    }
}
