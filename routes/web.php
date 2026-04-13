<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\SwordController;
use App\Models\Sword;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return redirect('/welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);

Route::get('/upload', function () {
    if (!session('user_id')) {
        return redirect('/register')->with('error', 'Please create an account to upload swords.');
    }
    return view('upload');
});

Route::get('/profile', function () {
    if (!session('user_id')) {
        return redirect('/register')->with('error', 'Please create an account to view your profile.');
    }
    
    $profileUser = User::find(session('user_id'));
    $swords = $profileUser ? Sword::where('user_id', $profileUser->id)->latest()->get() : collect();
    $swordCount = $swords->count();
    $followersCount = $profileUser ? $profileUser->followers()->count() : 0;
    $followingCount = $profileUser ? $profileUser->following()->count() : 0;

    return view('profile', compact('profileUser', 'swords', 'swordCount', 'followersCount', 'followingCount'));
});

Route::post('/profile/photo', function (\Illuminate\Http\Request $request) {
    if (!session('user_id')) {
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
    if (!session('user_id')) {
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
    $email = trim((string) $request->input('email'));
    $password = trim((string) $request->input('password'));

    if ($email === '' || $password === '') {
        return redirect('/login')->with('error', 'Please enter your email and password.');
    }

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

Route::get('/feed', function () {
    $swords = Sword::with('user')->latest()->get();
    return view('feed', compact('swords'));
});

Route::get('/user/{user}', function (User $user) {
    $swords = Sword::where('user_id', $user->id)->latest()->get();
    $swordCount = $swords->count();
    $followersCount = $user->followers()->count();
    $followingCount = $user->following()->count();
    $isFollowed = session('user_id') ? \App\Models\User::find(session('user_id'))->isFollowing($user->id) : false;
    $likedSwords = session('user_id') ? \App\Models\Sword::whereIn('id', \App\Models\Like::where('user_id', session('user_id'))->pluck('sword_id'))->get() : collect();
    
    return view('user-profile', compact('user', 'swords', 'swordCount', 'followersCount', 'followingCount', 'isFollowed', 'likedSwords'));
});

Route::post('/swords', [SwordController::class, 'store']);
Route::get('/swords/{sword}/edit', [SwordController::class, 'edit']);
Route::put('/swords/{sword}', [SwordController::class, 'update']);
Route::delete('/swords/{sword}', [SwordController::class, 'destroy']);

Route::post('/swords/{sword}/like', function (\Illuminate\Http\Request $request, Sword $sword) {
    if (!session('user_id')) {
        return back()->with('error', 'You must be logged in to like swords.');
    }
    
    $userId = session('user_id');
    $like = \App\Models\Like::where('user_id', $userId)->where('sword_id', $sword->id)->first();
    
    if ($like) {
        $like->delete();
        return back();
    } else {
        \App\Models\Like::create([
            'user_id' => $userId,
            'sword_id' => $sword->id,
        ]);
        return back();
    }
});

Route::post('/users/{user}/follow', function (\Illuminate\Http\Request $request, User $user) {
    if (!session('user_id')) {
        return back()->with('error', 'You must be logged in to follow users.');
    }
    
    $userId = session('user_id');
    
    if ($userId == $user->id) {
        return back()->with('error', 'You cannot follow yourself.');
    }
    
    $follow = \App\Models\Follow::where('follower_id', $userId)->where('following_id', $user->id)->first();
    
    if ($follow) {
        $follow->delete();
        return back();
    } else {
        \App\Models\Follow::create([
            'follower_id' => $userId,
            'following_id' => $user->id,
        ]);
        return back();
    }
});
