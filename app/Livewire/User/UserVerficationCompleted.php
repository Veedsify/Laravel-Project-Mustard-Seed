<?php

namespace App\Livewire\User;

use Livewire\Component;

class UserVerficationCompleted extends Component
{
    public function render()
    {
        $status = auth()->user()->idVerified->verification_status;

        return view('livewire.user.user-verfication-completed',[
            'status' => $status
        ]);
    }
}
