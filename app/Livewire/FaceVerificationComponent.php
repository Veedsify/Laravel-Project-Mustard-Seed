<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class FaceVerificationComponent extends Component
{
    use WithFileUploads;
    public $image;
    public function saveFace()
    {
        try {
            // Validate the image
            $this->validate([
                'image' => 'required|image',
            ]);
            $saveImage = Storage::disk('s3')->put('face/' . Str::random(32), $this->image);
            dd($saveImage);
            return $saveImage;
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.face-verification-component');
    }
}
