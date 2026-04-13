<?php

namespace App\Http\Controllers;

use App\Models\Follow;
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
            return $this->respond($request, [
                'message' => 'You cannot follow yourself.',
            ], 422);
        }

        $follow = Follow::where('follower_id', $currentUser->id)
            ->where('following_id', $user->id)
            ->first();

        if ($follow) {
            $follow->delete();
            $following = false;
        } else {
            Follow::create([
                'follower_id' => $currentUser->id,
                'following_id' => $user->id,
            ]);
            $following = true;
        }

        return $this->respond($request, [
            'following' => $following,
            'button_label' => $following ? 'Following' : 'Follow',
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

    private function respond(Request $request, array $payload, int $status = 200)
    {
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json($payload, $status);
        }

        if ($status >= 400) {
            return back()->with('error', $payload['message'] ?? 'Unable to update follow status.');
        }

        return back();
    }
}
