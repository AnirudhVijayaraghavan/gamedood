<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LogoutButton extends Component
{
    public function logout()
    {
        $user = Auth::user();

        Auth::logout();

        // Clear remember_token in DB
        if ($user) {
            $user->setRememberToken(null);
            $user->save();
        }

        // Forget the cookie
        Cookie::queue(Cookie::forget(Auth::getRecallerName()));

        session()->invalidate();
        session()->regenerateToken();

        // Redirect back to login
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.logout-button');
    }
}
