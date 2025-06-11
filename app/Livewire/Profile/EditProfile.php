<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class EditProfile extends Component
{
    public $name;
    public $email;

    public $new_password = '';
    public $new_password_confirmation = '';

    public $confirmingDelete = false;

    public $accountMessage = '';
    public $passwordMessage = '';

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3'],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore(Auth::id()),
            ],
        ];
    }

    protected function passwordRules()
    {
        return [
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
            'new_password_confirmation' => ['required', 'string', 'min:8'],
        ];
    }

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function updated($property)
    {
        // real-time for both sets of rules
        if (in_array($property, ['name', 'email'])) {
            $this->validateOnly($property, $this->rules());
        } else {
            $this->validateOnly($property, $this->passwordRules());
        }
    }

    public function updateAccount()
    {
        $data = $this->validate($this->rules());

        $user = Auth::user();
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        $this->accountMessage = 'Account info updated.';
        $this->resetValidation(['name', 'email']);
    }

    public function changePassword()
    {
        $data = $this->validate($this->passwordRules());

        $user = Auth::user();
        $user->password = Hash::make($data['new_password']);
        $user->save();

        $this->new_password = $this->new_password_confirmation = '';
        $this->passwordMessage = 'Password changed successfully.';
        $this->resetValidation(['new_password', 'new_password_confirmation']);
    }

    public function confirmDelete()
    {
        $this->confirmingDelete = true;
    }

    public function cancelDelete()
    {
        $this->confirmingDelete = false;
    }

    public function deleteAccount()
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.profile.edit-profile')
            ->layout('layouts.app');
    }
}
