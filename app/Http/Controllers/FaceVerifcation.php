<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function attachFace(Request $request)
    {
        Log::info($request->all());
        $user = User::find($request->user_id);
        if ($user) {
            $face = $request->face;
            $facePath = Storage::put('faces/', $face);
            $findUserId = $user->idVerified;
            if ($findUserId) {
                $findUserId->face_path = $facePath;
                $findUserId->save();
                $id = $findUserId->id_path;
                $recognize = new RekognitionService();
                $faceMatch = $recognize->compareFaces($id, $facePath);
                Log::info(json_encode($faceMatch));
                if ($faceMatch[0]['Similarity'] < 65) {
                    return response()->json(['message' => 'Face Not Matched', 'success' => false], 200);
                }else{
                    $findUserId->verification_status = true;
                    $findUserId->save();
                    return response()->json(['message' => 'Face Matched', 'success' => true], 200);
                }

            } 
            return response()->json(['message' => 'Face Attached', 'success' => true], 200);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
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