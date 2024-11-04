<?php

namespace App\Livewire\Comp;

use App\Models\MyJob;
use Livewire\Component;

class JobDetailComponent extends Component
{
    public $slug = '';
    public function mount($slug){
        $this->slug = $slug;
    }
    public function render()
    {
        if($this->slug){
            $job = MyJob::where([
                'slug' => $this->slug,
                'status' => true
                ])->first();
            return view('livewire.comp.job-detail-component',[
                'job' => $job
            ]);
        }
    }
}
