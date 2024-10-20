<?php

namespace App\Http\Controllers;

use App\Services\RekognitionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class FaceVerifcation extends Controller
{

    public function index()
    {
        return view('face-verification');
    }

    public function saveFace(Request $request)
    {
        try {
            // Validate the image
            $request->validate([
                'image' => 'required|image',
            ]);

            $recognize = new RekognitionService();

            if ($request->hasFile('image')) {
                $path = Storage::put('images', $request->file('image'));
                $thisFace = $recognize->compareFaces($path, $path); 
                dd($thisFace[0]['Similarity']);
            } else {
                dd('No Image File Added');
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
    }
}
