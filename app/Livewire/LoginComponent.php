<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginComponent extends Component
{
    public $id;
    public function mount()
    {
        // $userFromQuery = request()->query('id') ?? null;
        // if ($userFromQuery) {
        //     $this->id = $userFromQuery;
        // } else {
        //     $this->id = 1;
        // }uery = request()->query('id') ?? null;
        // if ($userFromQuery) {
        //     $this->id = $userFromQuery;
        // } else {
        //     $this->id = 1;
        // }
    }
    public function render()
    {
        // Auth::login(User::find($this->id));
        return view('livewire.login-component');
    }
}
