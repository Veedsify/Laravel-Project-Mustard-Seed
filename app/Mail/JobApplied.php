<?php

namespace App\Mail;

use App\Models\MyJob;
use App\Models\MyJobApplication;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class JobApplied extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public string $coverLetter;
    public string $resume;
    public MyJob $job;
    public MyJobApplication $application;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, string $coverLetter, string $resume, MyJob $job, MyJobApplication $application)

    {
        $this->user = $user;
        $this->coverLetter = $coverLetter;
        $this->resume = $resume;
        $this->job = $job;
        $this->application = $application;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Job Applied',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.job-applied',
            with: [
                'user' => $this->user,
                'coverLetter' => $this->coverLetter,
                'resume' => $this->resume,
                'myJob' => $this->job,
                'application' => $this->application,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
//            'resume' => Storage::disk('local')->path($this->resume),
        ];
    }
}
