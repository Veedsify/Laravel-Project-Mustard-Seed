<?php

namespace App\Livewire\Comp;

use App\Mail\JobApplied;
use App\Models\MyJob;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Resend\Laravel\Facades\Resend;

class JobDetailComponent extends Component
{
    use WithFileUploads;

    public $slug = '';

    public $coverLetter = '';

    #[Validate('image|max:4096')]
    public $resume;
    public $phone;

    public function applyForJob($id)
    {
        if (auth()->check()) {
            $job = MyJob::find($id);

            // find if user has already applied for this job
            $applied = $job->jobApplication()->where('user_id', auth()->id())->first();

            if ($applied) {
                $this->dispatch('notify-error', message: 'You have already applied for this job.');
                return;
            }
            $storeResume = $this->resume->store(path: 'resumes');
            $application = $job->jobApplication()->create([
                'user_id' => auth()->id(),
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'phone' => $this->phone,
                'cover_letter' => $this->coverLetter,
                'resume' => $storeResume,
            ]);

            Resend::emails()->send([
                'from' => 'Mustard Seed Charity <info@mustardseedcharity.com>',
                'to' => $job->user->email,
                'subject' => 'New Contact Form Submission',
                'html' => (new JobApplied(User::find(Auth::id()), $this->coverLetter, $this->resume, $job, $application))->render(),
                'attachments' => [
                    [
                        'content' => base64_encode(Storage::get($storeResume)),
                        'filename' => 'resume.' . pathinfo($storeResume, PATHINFO_EXTENSION),
                    ],
                ],
            ]);

            $this->dispatch('notify', message: 'We have received your application and will get back to you soon.');
        } else {
            $this->dispatch('notify-error', message: 'You need to login to apply for this job.');
        }
    }

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        if ($this->slug) {
            $job = MyJob::where([
                'slug' => $this->slug,
                'status' => true,
            ])->first();

            if(!$job){
                abort(404);
            }

            return view('livewire.comp.job-detail-component', [
                'job' => $job,
            ]);
        }
    }
}
