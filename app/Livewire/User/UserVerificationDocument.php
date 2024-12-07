<?php

namespace App\Livewire\User;

use App\Services\RekognitionService;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserVerificationDocument extends Component
{
    use WithFileUploads;

    public $fileType = '';
    public $file;
    public $file2;

    private function findFirstName($firstName, $text)
    {
        $strPos = stripos($text, $firstName) !== false;
        if (!$strPos) {
            Notification::make()
                ->title('The name on the ID does not match the name on your account')
                ->danger()
                ->send();
            return false;
        }
        return $strPos;
    }

    private function getIdNumber($filepath, $firstName)
    {
        try {
            $recognize = new RekognitionService();
            $texts = $recognize->extractText($filepath);
            $detectedTexts = array_column($texts, 'DetectedText');
            $singleLineText = implode(' ', $detectedTexts);

            // Improved regex pattern to match various ID number formats
            $patterns = [
                '/(\d{4}\s*\d{4}\s*\d{4})/u',  // 4-4-4 format
                '/(\d{4}\s*\d{3}\s*\d{4})/u',  // 4444 444 4444 format
                '/(\d{12})/u',                 // 12 consecutive digits
                '/(\d{2}\s*\d{2}\s*\d{2}\s*\d{2}\s*\d{2}\s*\d{2})/u', // 2-2-2-2-2-2 format
                '/(\d{9})/u'                   // 9 digits
            ];

            $nin = null;
            foreach ($patterns as $pattern) {
                if (preg_match($pattern, $singleLineText, $matches)) {
                    $nin = str_replace(' ', '', $matches[1]); // Remove spaces, use first captured group
                    break;
                }
            }

            // Log::info($detectedTexts);
            // Log::info($nin);

            if ($nin !== null) {
                // Only proceed if a potential NIN is found
                if ($this->findFirstName($firstName, $singleLineText)) {
                    // Validate NIN length if needed (adjust as per your specific requirements)
                    return intval($nin);
                }
            }

            // If no valid NIN is found
            Notification::make()
                ->title('Unable to detect a valid ID number. Please upload a clear image of your ID.')
                ->danger()
                ->send();
            return null;
            // return $texts;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return '';
        }
    }

    public function saveDocuments()
    {
        $this->validate([
            'fileType' => 'required|string',
            'file' => 'required|mimes:jpeg,png,pdf|max:2024',
        ]);
        $filePath = Storage::put('documents', $this->file);
        if (Auth::check()) {
            $user = Auth::user();
            $idNumber = $this->getIdNumber($filePath, $user->IdVerified->first_name);
            if (!$idNumber) {
                return;
            }
            $user->IdVerified->id_type = $this->fileType;
            $user->IdVerified->id_path = $filePath;
            $user->IdVerified->id_number = $idNumber;
            $user->IdVerified->save();
            Notification::make()
                ->title('Document Uploaded')
                ->success()
                ->send();
            $this->dispatch('nextStep');
            return;
        } else {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.user.user-verification-document');
    }
}
