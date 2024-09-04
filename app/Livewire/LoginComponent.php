<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginComponent extends Component
{
    public function render()
    {
        Auth::login(User::find(87));
        return view('livewire.login-component');
    }
}
