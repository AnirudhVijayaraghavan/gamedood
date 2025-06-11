<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class Login extends Component
{
    public $email;
    public $password;
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|string',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        $this->validate();

        if (
            Auth::attempt(
                ['email' => $this->email, 'password' => $this->password],
                $this->remember
            )
        ) {
            session()->regenerate();

            // If the user did *not* check "remember", flush any token that got set
            if (!$this->remember) {
                $user = Auth::user();
                $user->setRememberToken(null);
                $user->save();
                // Also forget the remember cookie
                Cookie::queue(Cookie::forget(Auth::getRecallerName()));
            }

            return redirect()->intended('dashboard');
        }

        $this->addError('email', 'These credentials do not match our records.');
    }

    public function logout()
    {
        $user = Auth::user();

        Auth::logout();

        // Clear DB token
        if ($user) {
            $user->setRememberToken(null);
            $user->save();
        }
        // Clear cookie
        Cookie::queue(Cookie::forget(Auth::getRecallerName()));

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.app');
    }
}
