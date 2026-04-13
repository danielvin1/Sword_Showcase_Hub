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
    return view('upload');
});

Route::get('/profile', function () {
    $profileUser = session('user_id') ? User::find(session('user_id')) : null;

    if (! $profileUser && session('user_email')) {
        $profileUser = User::where('email', session('user_email'))->first();
    }

    $swords = $profileUser
        ? Sword::where('user_id', $profileUser->id)->latest()->get()
        : collect();

    $swordCount = $swords->count();

    return view('profile', compact('profileUser', 'swords', 'swordCount'));
});

Route::post('/profile/photo', function (\Illuminate\Http\Request $request) {
    $profileUser = session('user_id') ? User::find(session('user_id')) : null;

    if (! $profileUser && session('user_email')) {
        $profileUser = User::where('email', session('user_email'))->first();
    }

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
    $profileUser = session('user_id') ? User::find(session('user_id')) : null;

    if (! $profileUser && session('user_email')) {
        $profileUser = User::where('email', session('user_email'))->first();
    }

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

Route::post('/sword-upload', [SwordController::class, 'store']);
Route::get('/swords/{sword}/edit', [SwordController::class, 'edit']);
Route::put('/swords/{sword}', [SwordController::class, 'update']);
Route::delete('/swords/{sword}', [SwordController::class, 'destroy']);
