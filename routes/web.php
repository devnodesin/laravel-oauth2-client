<?php

use App\Http\Controllers\Auth\OAuth2ClientLoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Redirect to OAuth2 server for authorization
Route::get('/login', [OAuth2ClientLoginController::class, 'login'])->name('login');
Route::get('/auth', [OAuth2ClientLoginController::class, 'callback'])->name('oauth2.callback');

Route::middleware(['auth'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    // Logout route
    Route::post('/logout', function () {
        Auth::logout();

        return redirect()->route('home');
    })->name('logout');
});
