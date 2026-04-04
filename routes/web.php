<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $email = trim((string) $request->input('email'));
    $password = trim((string) $request->input('password'));

    if ($email === '' || $password === '') {
        return redirect('/login')->with('error', 'Please enter your email and password.');
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
