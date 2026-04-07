<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/profile', function () {
    return view('profile');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/upload', function () {
    return view('upload');
});

Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $email = trim((string) $request->input('email'));
    $password = trim((string) $request->input('password'));

    if ($email === '' || $password === '') {
        return redirect('/login')->with('error', 'Please enter your email and password.');
    }

    if ($request->hasFile('profile_photo')) {
        $photo = $request->file('profile_photo');
        $filename = 'profile_' . time() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('uploads'), $filename);
        session(['profile_photo' => '/uploads/' . $filename]);
    }

    session([
        'logged_in' => true,
        'user_email' => $email,
    ]);

    return redirect('/feed');
});

Route::get('/feed', function () {
    return view('feed');
});
