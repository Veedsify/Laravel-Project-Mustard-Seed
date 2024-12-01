<?php

namespace App\Livewire;

use App\Models\BottomGallery;
use Livewire\Component;

class GalleryComponent extends Component
{
    public function render()
    {
        $bottomGallery = BottomGallery::all();
        return view('livewire.gallery-component',[
            'bottomGallery' => $bottomGallery
        ]);
    }
}
