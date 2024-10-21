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
            $pattern = '/(\d{4}\s*\d{3}\s*\d{4})/';
            if (preg_match($pattern, $singleLineText, $matches)) {
                $nin = str_replace(' ', '', $matches[0]); // Remove spaces if necessary
                if ($this->findFirstName($firstName, $singleLineText)) {
                    return intval($nin);
                } else {
                    return null;
                }
            } else {
                Notification::make()
                    ->title('Please upload a clear image of your ID')
                    ->danger()
                    ->send();
                return null;
            }
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
