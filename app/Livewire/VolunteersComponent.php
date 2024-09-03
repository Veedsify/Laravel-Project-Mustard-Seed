<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class VolunteersComponent extends Component
{
    use WithPagination;
    
    public function render()
    {
        // $volunteers = User::where('role', 'volunteer')->orderByDesc('created_at')->paginate(9);
        $volunteers = User::where('role', 'volunteer')->paginate(9);
        return view('livewire.volunteers-component', [
            'volunteers' => $volunteers
        ]);
    }
}
