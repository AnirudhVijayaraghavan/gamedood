<?php

use Inertia\Inertia;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\RegisterController;



// Public landing
Route::view('/', 'welcome')->name('home');

// Guest-only (no npm, no extra controllers—Livewire handles the rest)
Route::middleware('guest')->group(function () {
    Route::view('login',    'auth.login')->name('login');
    Route::view('register', 'auth.register')->name('register');
});

// Authenticated
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // Profile editor (Blade view embeds <livewire:profile.edit-profile />)
    Route::view('profile', 'profile')->name('profile');

    // Logout (still a POST)
    Route::post('logout', function () {
        $user = Auth::user();

        // Log out of the session
        Auth::logout();

        // Clear the remember_token on the user
        if ($user) {
            $user->setRememberToken(null);
            $user->save();
        }

        // Forget the “remember me” cookie
        Cookie::queue(Cookie::forget(Auth::getRecallerName()));

        // Invalidate and regenerate session
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('home');
    })->name('logout');
});

// If you want to re-enable Inertia-based routes later, just uncomment:
// use Inertia\Inertia;
// Route::middleware('auth')->group(function () {
//     Route::get('/games',       fn() => Inertia::render('Games/Index'));
//     Route::get('/games/{game}',fn($game)=> Inertia::render('Games/Show',['gameId'=>$game]));
//     Route::get('/chat',        fn() => Inertia::render('Chat/Index'));
// });