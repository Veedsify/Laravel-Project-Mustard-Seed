<?php

namespace App\Livewire;

use App\Models\MyJob;
use Livewire\Component;

class JobComponent extends Component
{
    public $title = 'Jobs';

    public function render()
    {
        $jobs = MyJob::where('status', true)->latest()->paginate(6);
        return view('livewire.job-component',[
            'jobs' => $jobs
        ]);
    }
}
