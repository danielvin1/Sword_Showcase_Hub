<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\SwordController;
use App\Models\Like;
use App\Models\Sword;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

$resolveSessionUser = function () {
    $profileUser = session('user_id') ? User::find(session('user_id')) : null;

    if (! $profileUser && session('user_email')) {
        $profileUser = User::where('email', session('user_email'))->first();
    }

    return $profileUser;
};

Route::get('/', function () {
    return redirect('/welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/storage/{path}', [StorageController::class, 'show'])->where('path', '.*');

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [AuthController::class, 'register']);

Route::get('/upload', function () {
    if (! session('user_id')) {
        return redirect('/register')->with('error', 'Please create an account to upload swords.');
    }

    return view('upload');
});

Route::post('/upload/swords', [SwordController::class, 'store'])->name('upload.swords.store');

Route::get('/profile', function () use ($resolveSessionUser) {
    if (! session('user_id')) {
        return redirect('/register')->with('error', 'Please create an account to view your profile.');
    }

    $currentUser = $resolveSessionUser();
    $profileUser = $currentUser;
    $swords = $profileUser ? $profileUser->swords()->latest()->get() : collect();
    $likedSwords = $profileUser
        ? Sword::whereIn('id', Like::where('user_id', $profileUser->id)->pluck('sword_id'))->latest()->get()
        : collect();

    return view('profile', [
        'currentUser' => $currentUser,
        'profileUser' => $profileUser,
        'swords' => $swords,
        'likedSwords' => $likedSwords,
        'swordCount' => $swords->count(),
        'isOwnProfile' => true,
        'isFollowing' => false,
        'followerCount' => $profileUser?->followers()->count() ?? 0,
        'followingCount' => $profileUser?->following()->count() ?? 0,
    ]);
});

Route::get('/user/{user}', function (User $user) use ($resolveSessionUser) {
    $currentUser = $resolveSessionUser();
    $swords = $user->swords()->latest()->get();
    $likedSwords = Sword::whereIn('id', Like::where('user_id', $user->id)->pluck('sword_id'))->latest()->get();

    return view('profile', [
        'currentUser' => $currentUser,
        'profileUser' => $user,
        'swords' => $swords,
        'likedSwords' => $likedSwords,
        'swordCount' => $swords->count(),
        'isOwnProfile' => $currentUser ? (int) $currentUser->id === (int) $user->id : false,
        'isFollowing' => $currentUser ? $currentUser->isFollowing($user->id) : false,
        'followerCount' => $user->followers()->count(),
        'followingCount' => $user->following()->count(),
    ]);
});

Route::post('/profile/photo', function (\Illuminate\Http\Request $request) {
    if (! session('user_id')) {
        return redirect('/register')->with('error', 'Please log in first.');
    }

    $profileUser = User::find(session('user_id'));

    if (! $profileUser) {
        return redirect('/login')->with('error', 'Please log in first.');
    }

    $request->validate(['profile_photo' => 'required|image|max:2048']);

    if ($profileUser->profile_photo) {
        Storage::disk('public')->delete($profileUser->profile_photo);
    }

    $path = $request->file('profile_photo')->store('profile-photos', 'public');
    $profileUser->profile_photo = $path;
    $profileUser->save();
    session(['profile_photo' => $path]);

    return redirect('/profile')->with('success', 'Profile picture updated.');
});

Route::post('/profile/update', function (\Illuminate\Http\Request $request) {
    if (! session('user_id')) {
        return redirect('/register')->with('error', 'Please log in first.');
    }

    $profileUser = User::find(session('user_id'));

    if (! $profileUser) {
        return redirect('/login')->with('error', 'Please log in first.');
    }

    $request->validate([
        'name' => 'required|string|max:60',
        'profile_photo' => 'nullable|image|max:2048',
        'banner_photo' => 'nullable|image|max:4096',
    ]);

    $profileUser->name = $request->input('name');

    if ($request->hasFile('profile_photo')) {
        if ($profileUser->profile_photo) {
            Storage::disk('public')->delete($profileUser->profile_photo);
        }

        $path = $request->file('profile_photo')->store('profile-photos', 'public');
        $profileUser->profile_photo = $path;
        session(['profile_photo' => $path]);
    }

    if ($request->hasFile('banner_photo')) {
        if ($profileUser->banner_photo) {
            Storage::disk('public')->delete($profileUser->banner_photo);
        }

        $bannerPath = $request->file('banner_photo')->store('profile-banners', 'public');
        $profileUser->banner_photo = $bannerPath;
        session(['profile_banner' => $bannerPath]);
    }

    $profileUser->save();
    session(['user_name' => $profileUser->name]);

    return redirect('/profile')->with('success', 'Profile updated.');
});

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $email = trim((string) $validated['email']);
    $password = trim((string) $validated['password']);

    $user = User::where('email', $email)->first();

    if (! $user || ! Hash::check($password, $user->password)) {
        return redirect('/login')->with('error', 'Your login details are incorrect.');
    }

    session([
        'logged_in'     => true,
        'user_id'       => $user->id,
        'user_name'     => $user->name,
        'user_email'    => $email,
        'profile_photo' => $user->profile_photo,
    ]);

    return redirect('/feed');
});

Route::post('/logout', function (\Illuminate\Http\Request $request) {
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/welcome');
});

Route::get('/feed', function () use ($resolveSessionUser) {
    $currentUser = $resolveSessionUser();
    $swords = Sword::with('user')
        ->get()
        ->groupBy('user_id')
        ->map(fn ($group) => $group->shuffle()->first())
        ->values()
        ->shuffle();
    $followingIds = $currentUser
        ? $currentUser->following()->pluck('following_id')->map(fn ($id) => (int) $id)->all()
        : [];

    return view('feed', compact('swords', 'currentUser', 'followingIds'));
});

Route::post('/users/{user}/follow', [FollowController::class, 'toggle']);
Route::post('/swords', [SwordController::class, 'store'])->name('swords.store');
Route::get('/swords/{sword}/edit', [SwordController::class, 'edit']);
Route::put('/swords/{sword}', [SwordController::class, 'update']);
Route::delete('/swords/{sword}', [SwordController::class, 'destroy']);

Route::post('/swords/{sword}/like', function (\Illuminate\Http\Request $request, Sword $sword) {
    if (! session('user_id')) {
        return back()->with('error', 'You must be logged in to like swords.');
    }

    $userId = session('user_id');
    $like = Like::where('user_id', $userId)->where('sword_id', $sword->id)->first();

    if ($like) {
        $like->delete();
        return back();
    }

    Like::create([
        'user_id' => $userId,
        'sword_id' => $sword->id,
    ]);

    return back();
});
